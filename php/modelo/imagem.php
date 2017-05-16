<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "../../resources/fw/resize/image.php";
use \Eventviva\ImageResize;
/**
 * Description of Imagem
 *
 * @author AhmedJorge
 */
class Imagem {
    const TMP_NAME = "tmp_name";
    const NAME = "name";
    const ERROR = "error";
    const SIZE = "size";
    private $size;
    private $file;
    private $name;
    private $tmp;
    private $erro;
    private $extensao;
    private $newFileName;
    private $caminhoCompletoNewFile;
    private $caminhoCompletoNewFileView;
    private $repositorio = "../../resources/$$";
    private $repositorioView = "../resources/$$";
    function __construct($file, $complentNanme = "images/loadImage/")
    {
        $this->repositorio = str_replace("$$", $complentNanme, $this->repositorio);
        $this->repositorioView = str_replace("$$", $complentNanme, $this->repositorioView);

        if ($file != null) {
            $this->file = $file;
            $this->name = $this->file[Imagem::NAME];
            $this->tmp = $this->file[Imagem::TMP_NAME];
        }
        if($this->tmp)
        {
            $this->extensao = strchr($this->name, '.');
            if(strtoupper($this->extensao) == strtoupper(".PNG")
                || strtoupper($this->extensao) == strtoupper(".GIF")
                || strtoupper($this->extensao) == strtoupper(".PDF")
                || strtoupper($this->extensao) == strtoupper(".JPEG")
                || strtoupper($this->extensao) == strtoupper(".JPG"))
            {
                $this->deleteAllFileInDirectory();
//              // cria o novo ficheiro com o id de utilizador encriptado, data e hora, e com a extensão do ficheiro
                $this->newFileName = md5(5643)."-".md5(time().date("d-m-y h:M:s")).$this->extensao;
                // adiciona o ficheiro na pasta loadImage
                $this->caminhoCompletoNewFile =  $this->repositorio.$this->newFileName;
                // recupera a imagem adicionada na pasta
                $this->caminhoCompletoNewFileView = $this->repositorioView.$this->newFileName;
                move_uploaded_file($this->tmp, $this->caminhoCompletoNewFile);
                chmod($this->caminhoCompletoNewFile, 0777);
            }
            else $this->newFileName = null;
        }
        else $this->newFileName = null;
    }
    function getSize() {
        return $this->size;
    }
    function getFile() {
        return $this->file;
    }
    function getName() {
        return $this->name;
    }
    function getTmp() {
        return $this->tmp;
    }
    function getErro() {
        return $this->erro;
    }
    function getRepositorio() {
        return $this->repositorio;
    }
    function setSize($size) {
        $this->size = $size;
    }
    function setFile($file) {
        $this->file = $file;
    }
    function setName($name) {
        $this->name = $name;
    }
    function setTmp($tmp) {
        $this->tmp = $tmp;
    }
    function setErro($erro) {
        $this->erro = $erro;
    }
    function setRepositorio($repositorio) {
        $this->repositorio = $repositorio;
    }
    function getExtensao() {
        return $this->extensao;
    }
    function setExtensao($extensao) {
        $this->extensao = $extensao;
    }
    function getNewFileName() {
        return $this->newFileName;
    }
    function setNewFileName($newFileName) {
        $this->newFileName = $newFileName;
    }
    /**
     * @return string
     */
    public function getCaminhoCompletoNewFile()
    {
        return $this->caminhoCompletoNewFile;
    }
    /**
     * @param string $caminhoCompletoNewFile
     */
    public function setCaminhoCompletoNewFile($caminhoCompletoNewFile)
    {
        $this->caminhoCompletoNewFile = $caminhoCompletoNewFile;
    }
    /**
     * @return string
     */
    public function getCaminhoCompletoNewFileView()
    {
        return $this->caminhoCompletoNewFileView;
    }
    /**
     * @param string $caminhoCompletoNewFileView
     */
    public function setCaminhoCompletoNewFileView($caminhoCompletoNewFileView)
    {
        $this->caminhoCompletoNewFileView = $caminhoCompletoNewFileView;
    }
    function getRepositorioView() {
        return $this->repositorioView;
    }
    function setRepositorioView($repositorioView) {
        $this->repositorioView = $repositorioView;
    }
    public function deleteAllFileInDirectory(){
        $user = 5666;
        foreach (scandir($this->getRepositorio()) as $file)
        {
            if(is_file($this->getRepositorio()."/".$file) && !strpos($file."",md5($user) )){
                unlink($this->getRepositorio()."/".$file);
            }
        }
    }
    /**
     * @param $file
     * @param $size
     * @return string
     */
    public static function reside($file, $size){
        $image = new ImageResize($file);
        $image->resizeToWidth($size);
        $fileName = $file . $size;
        $image->save($fileName);
        //chmod($fileName, 0777);
        return $fileName;
    }
    /**
     * @param $file
     * @param $size
     * @return string
     */
    public static function reside_only($file, $size){
        $image = new ImageResize($file);
        $image->resizeToWidth($size);
        $fileName = $file;
        $image->save($fileName);
        return $fileName;
    }
    public static function getPhoto($id, $photo, $url)
    {
        if($photo != null)
        {
            $id = md5($id);
            file_put_contents("../../resources/images/loadImage/".$id, base64_decode($photo));
            $photo = $url.$id;
        }
        else{
            $photo = "";
        }
        return $photo;
    }
    public static function get_photo_redimensionado($id, $photo, $caminho, $size)
    {
        $photo_ = "";
        $id = md5($id);
        $caminho_ = "../../../../siie/resources/img/".$caminho.$id;
        if($photo != null)
        {
            file_put_contents($caminho_, pg_unescape_bytea($photo));
            $photo_ = "./resources/img/".$caminho.$id;
            self::reside_only($caminho_, $size);
        }
        return $photo_;
    }

    public static function getFileName($longName){
        $ar = explode("/",$longName);
        $c = count($ar);
        return $ar[$c-1];
    }
}