<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppChamado;
use App\TipoErro;
use App\Usuario;
use App\Exports\ChamadosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use PDF;

use function Ramsey\Uuid\v1;

class TecnicoController extends Controller
{
    public function tecnico()
    {
        if ($_SESSION['idusuariotipo'] != 4) {
            return redirect()->route('chamado.solicitante');
        }
        $atribuicao = '';
        $status_alterado = '';

        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $dados_chamado = AppChamado::all()->where('tecnico_id', NULL);

        $usuario = AppChamado::with('usuario')->get();

        $nome_solicitante_mail = "Pendente";

        return view('app.tecnico.index', ['titulo' => 'Principal Resposável', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro, 'nome_solicitante_mail' => $nome_solicitante_mail]);
    }

    public function meuschamados()
    {
        if ($_SESSION['idusuariotipo'] != 4) {
            return redirect()->route('chamado.solicitante');
        }

        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $usuario = $_SESSION['idusuario'];

        $nome_solicitante_mail = "Pendente";

        $tec = Usuario::all();

        $status_alterado = '';
        //mostra tecnico atribuido
        $cpfacesso = $_SESSION['cpf'];

        foreach ($tec as $key => $tec) {
            if ($cpfacesso == $tec->cpf) {
                $idusuario = $tec->idusuario;
            }
        }

        $dados_chamado = AppChamado::all()->where('tecnico_id', $idusuario)->where('status', '1');

        $usuario = AppChamado::with('usuario')->get();

        return view('app.tecnico.meuschamados', ['titulo' => 'Meus chamados', 'dados_chamado' => $dados_chamado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'status_alterado' => $status_alterado, 'tipo_erro' => $tipo_erro, 'nome_solicitante_mail' => $nome_solicitante_mail]);
    }

    public function concluido_responsavel()
    {
        if ($_SESSION['idusuariotipo'] != 4) {
            return redirect()->route('chamado.solicitante');
        }

        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $dados_chamado = AppChamado::all()->where('status', '2');

        $nome_solicitante_mail = "Pendente";

        $tec = Usuario::all();

        $status_alterado = '';
        //mostra tecnico atribuido
        $cpfacesso = $_SESSION['cpf'];

        foreach ($tec as $key => $tec) {
            if ($cpfacesso == $tec->cpf) {
                $idusuario = $tec->idusuario;
            }
        }

        $usuario = AppChamado::with('usuario')->get();

        return view('app.tecnico.concluido', ['titulo' => 'Concluido Responsável', 'dados_chamado' => $dados_chamado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'status_alterado' => $status_alterado, 'tipo_erro' => $tipo_erro, 'nome_solicitante_mail' => $nome_solicitante_mail]);
    }

    public function atribuir(Request $request, AppChamado $idchamado)
    {

        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $dados_chamado = AppChamado::all()->where('tecnico_id', NULL);

        $idchamado->update($request->all());

        $atribuicao = '';
        $status_alterado = '';

        $usuario = AppChamado::with('usuario')->get();

        $endereco = $_SESSION['endereco'];
        $nome_solicitante_mail = "Pendente";
        $nome_solicitante = $request->nome_solicitante;

        if ($nome_solicitante != "Pendente") {
            //enviando email para tecnico
            $mail_solicitante = Usuario::select('email')->where('nome', $nome_solicitante)->get()->first();

            $_SESSION['endereco'] = $mail_solicitante->email;
            $nome_solicitante_mail = $mail_solicitante->nome;
        }

        if ($idchamado) {

            //enviando email tecnico
            Mail::send('app.tecnico.mail.atribuicao_tecnico', ['nomeusuario' => $_SESSION['nome']], function ($message) {
                $message->from('cesadufs.ti@gmail.com', 'CESAD')->subject('Chamado - Atualização (não responda)');
                $message->to($_SESSION['email']);
            });

            //enviando email solicitante
            Mail::send('app.tecnico.mail.atribuicao_solicitante', ['nomeusuario' => $_SESSION['nome']], function ($message) {
                $message->from('cesadufs.ti@gmail.com', 'CESAD')->subject('Chamado - Atualização (não responda)');
                $message->to($_SESSION['endereco']);
            });

            $_SESSION['endereco'] = $endereco;

            $request->session()->flash('alert-danger', 'Atribuido com sucesso!');

            return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Resposável', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro, 'nome_solicitante_mail' => $nome_solicitante_mail]);
        }else{
            $request->session()->flash('alert-danger', 'Não atribuido!');

            return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Resposável', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro, 'nome_solicitante_mail' => $nome_solicitante_mail]);
        }
    }

    public function status(Request $request, AppChamado $idchamado)
    {
        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $usuario = $_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('tecnico_id', $usuario);

        $idchamado->update($request->all());

        $atribuicao = '';
        $status_alterado = '';

        $usuario = AppChamado::with('usuario')->get();

        $endereco = $_SESSION['endereco'];
        $nome_solicitante_mail = "Pendente";
        $nome_solicitante = $request->nome_solicitante;

        if ($nome_solicitante != "Pendente") {
            //enviando email para tecnico
            $mail_solicitante = Usuario::select('email')->where('nome', $nome_solicitante)->get()->first();

            $_SESSION['endereco'] = $mail_solicitante->email;
            $nome_solicitante_mail = $mail_solicitante->nome;
        }

        if ($idchamado) {
            //enviando email tecnico
            Mail::send('app.tecnico.mail.status_tecnico', ['nomeusuario' => $_SESSION['nome']], function ($message) {
                $message->from('cesadufs.ti@gmail.com', 'CESAD')->subject('Chamado - Atualização (não responda)');
                $message->to($_SESSION['email']);
            });

            //enviando email solicitante
            Mail::send('app.tecnico.mail.status_solicitante', ['nomeusuario' => $_SESSION['nome']], function ($message) {
                $message->from('cesadufs.ti@gmail.com', 'CESAD')->subject('Chamado - Atualização (não responda)');
                $message->to($_SESSION['endereco']);
            });

            $request->session()->flash('alert-danger', 'Status alterado com sucesso!');

            return redirect()->route('chamado.meuschamados', ['titulo' => 'Meus chamados', 'dados_chamado' => $dados_chamado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'status_alterado' => $status_alterado, 'tipo_erro' => $tipo_erro, 'nome_solicitante_mail' => $nome_solicitante_mail]);

        } else {

            $request->session()->flash('alert-danger', 'Status alterado com sucesso!');

            return view('app.tecnico.meuschamados', ['titulo' => 'Meus chamados', 'dados_chamado' => $dados_chamado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'status_alterado' => $status_alterado, 'tipo_erro' => $tipo_erro]);
        }
    }

    public function tipoerro(Request $request)
    {
        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $nome_solicitante_mail = "Pendente";

        $atribuicao = '';
        $status_alterado = '';

        $dados_chamado = AppChamado::all();

        $tipoerro = new TipoErro();

        $tipoerro->tipo_erro = $request->input('tipo_erro');

        $tipoerro->save();

        $usuario = AppChamado::with('usuario')->get();

        return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Resposável', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro, 'nome_solicitante_mail' => $nome_solicitante_mail]);
    }

    /*
    public function exportar()
    {
        //select tecnico
        $tecnico = Usuario::all();
        $dados_chamado = AppChamado::all();
        $tipo_erro = TipoErro::all();

        $pdf = PDF::loadView('app.layouts._partials.tecnico.relatorios.pdf', ['dados_chamado' => $dados_chamado, 'tipo_erro' => $tipo_erro, 'tecnico' => $tecnico, 'titulo' => 'Relatório']);
        //return $pdf->download('concluidos.pdf');
        return $pdf->stream('Relatorio Chamado.pdf');
    }
    */

    public function exportarg()
    {
        //select tecnico
        $tecnico = Usuario::all();
        $dados_chamado = AppChamado::all();
        $tipo_erro = TipoErro::all();

        $pdf = PDF::loadView('app.layouts._partials.tecnico.relatorios.pdf_concluidos', ['dados_chamado' => $dados_chamado, 'tipo_erro' => $tipo_erro, 'tecnico' => $tecnico, 'titulo' => 'Relatório Geral']);
        //return $pdf->download('concluidos.pdf');
        return $pdf->stream('Chamados.pdf');
    }

    public function exportara()
    {
        //select tecnico
        $tecnico = Usuario::all();
        $dados_chamado = AppChamado::all()->where('status', 1);
        $tipo_erro = TipoErro::all();

        $pdf = PDF::loadView('app.layouts._partials.tecnico.relatorios.pdf_concluidos', ['dados_chamado' => $dados_chamado, 'tipo_erro' => $tipo_erro, 'tecnico' => $tecnico, 'titulo' => 'Chamados em Aberto']);
        //return $pdf->download('concluidos.pdf');
        return $pdf->stream('Chamados_aberto.pdf');
    }

    public function exportarc()
    {
        //select tecnico
        $tecnico = Usuario::all();
        $dados_chamado = AppChamado::all()->where('status', 2);
        $tipo_erro = TipoErro::all();

        $pdf = PDF::loadView('app.layouts._partials.tecnico.relatorios.pdf_concluidos', ['dados_chamado' => $dados_chamado, 'tipo_erro' => $tipo_erro, 'tecnico' => $tecnico, 'titulo' => 'Chamados Concluidos']);
        //return $pdf->download('concluidos.pdf');
        return $pdf->stream('Chamados_concluidos.pdf');
    }

    /*
    public function exportacao($extensao){
        $data = date('d-m-Y');

        $nome_arquivo = 'relatório_chamado'.$data.'.';

        if(in_array($extensao, ['csv', 'pdf'])){
            return Excel::download(new ChamadosExport(), $nome_arquivo.$extensao);
        }

        return redirect()->route('chamado.tecnico');
    }*/
}
