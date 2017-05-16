<?php
/**
 * Created by PhpStorm.
 * User: ahmedjorge
 * Date: 25/04/17
 * Time: 8:01 AM
 */
class User
{
    private $id;
    private $nome = null;
    private $apelido;
    private $foto = null;
    private $photoUserSmall;
    private $photoUserTiny = null;
    private $senha;
    private $senhaConfirme;
    private $nomeAcesso;
    private $menu;
    private $idPerfil;
    private $Perfil;
    private $estado;
    private $idLogin = 1;

    /**
     * User constructor.
     * @return User
     */
    public function __construct()
    {
        return $this;
    }
    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }
    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }
    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }
    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    /**
     * @return mixed
     */
    public function getSexoId()
    {
        return $this->sexoId;
    }
    /**
     * @param mixed $sexoId
     */
    public function setSexoId($sexoId)
    {
        $this->sexoId = $sexoId;
    }
    /**
     * @param mixed $nif
     */
    public function setNif($nif)
    {
        $this->nif = $nif;
    }
    /**
     * @return mixed
     */
    public function getNomeAcesso()
    {
        return $this->nomeAcesso;
    }
    /**
     * @param mixed $nomeAcesso
     */
    public function setNomeAcesso($nomeAcesso)
    {
        $this->nomeAcesso = $nomeAcesso;
    }
    /**
     * @return mixed
     */
    public function getIdSetor()
    {
        return $this->idSetor;
    }
    /**
     * @param mixed $idSetor
     */
    public function setIdSetor($idSetor)
    {
        $this->idSetor = $idSetor;
    }
    /**
     * @return mixed
     */
    public function getPhotoUserSmall()
    {
        return $this->photoUserSmall;
    }
    /**
     * @param mixed $photoUserSmall
     */
    public function setPhotoUserSmall($photoUserSmall)
    {
        $this->photoUserSmall = $photoUserSmall;
    }
    /**
     * @return mixed
     */
    public function getPhotoUserTiny()
    {
        return $this->photoUserTiny;
    }
    /**
     * @param mixed $photoUserTiny
     */
    public function setPhotoUserTiny($photoUserTiny)
    {
        $this->photoUserTiny = $photoUserTiny;
    }
    /**
     * @return mixed
     */
    public function getNomeSetor()
    {
        return $this->nomeSetor;
    }
    /**
     * @param mixed $nomeSetor
     */
    public function setNomeSetor($nomeSetor)
    {
        $this->nomeSetor = $nomeSetor;
    }
    /**
     * @param mixed $nome
     * @return User
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    /**
     * @param mixed $apelido
     * @return User
     */
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;
        return $this;
    }
    /**
     * @param mixed $idAgencia
     * @return User
     */
    public function setIdAgencia($idAgencia)
    {
        $this->idAgencia = $idAgencia;
        return $this;
    }
    /**
     * @param mixed $foto
     * @return User
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }
    /**
     * @param mixed $fotoLogo
     * @return User
     */
    public function setFotoLogo($fotoLogo)
    {
        $this->fotoLogo = $fotoLogo;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getFotoLogoSmall()
    {
        return $this->fotoLogoSmall;
    }
    /**
     * @param mixed $fotoLogoSmall
     * @return User
     */
    public function setFotoLogoSmall($fotoLogoSmall)
    {
        $this->fotoLogoSmall = $fotoLogoSmall;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getFotoLogoTiny()
    {
        return $this->fotoLogoTiny;
    }
    /**
     * @param mixed $fotoLogoTiny
     * @return User
     */
    public function setFotoLogoTiny($fotoLogoTiny)
    {
        $this->fotoLogoTiny = $fotoLogoTiny;
        return $this;
    }
    /**
     * @param mixed $senha
     * @return User
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }
    /**
     * @param mixed $senhaConfirme
     * @return User
     */
    public function setSenhaConfirme($senhaConfirme)
    {
        $this->senhaConfirme = $senhaConfirme;
        return $this;
    }
    /**
     * @param mixed $menu
     * @return User
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;
        return $this;
    }
    /**
     * @param mixed $idPerfil
     * @return User
     */
    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;
        return $this;
    }
    /**
     * @param mixed $Perfil
     * @return User
     */
    public function setPerfil($Perfil)
    {
        $this->Perfil = $Perfil;
        return $this;
    }
    /**
     * @param mixed $estado
     * @return User
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }
    /**
     * @param mixed $estadoNome
     * @return User
     */
    public function setEstadoNome($estadoNome)
    {
        $this->estadoNome = $estadoNome;
        return $this;
    }
    /**
     * @param mixed $idLogin
     * @return User
     */
    public function setIdLogin($idLogin)
    {
        $this->idLogin = $idLogin;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->Agencia;
    }
    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }
    /**
     * @return mixed
     */
    public function getFotoLogo()
    {
        return $this->fotoLogo;
    }
    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }
    /**
     * @return mixed
     */
    public function getSenhaConfirme()
    {
        return $this->senhaConfirme;
    }
    /**
     * @return array
     */
    public function getMenu()
    {
        return $this->menu;
    }
    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }
    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->Perfil;
    }
    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * @return mixed
     */
    public function getEstadoNome()
    {
        return $this->estadoNome;
    }
    /**
     * @return mixed
     */
    public function getIdLogin()
    {
        return $this->idLogin;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }
    /**
     * @return mixed
     */
    public function getApelido()
    {
        return $this->apelido;
    }
    /**
     * @return mixed
     */
    public function getRedifinido()
    {
        return $this->redifinido;
    }
    /**
     * @param mixed $redifinido
     * @return User
     */
    public function setRedifinido($redifinido)
    {
        $this->redifinido = $redifinido;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param mixed $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}