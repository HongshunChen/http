<?php
interface Proto{
	//连接url
	public function conn($url);
	//发送get查询
	public function get();
	//发送post查询
	public function post();
	//关闭连接
	public function close();
}

class Http implements Proto{
	const CRLF="\r\n";
	protected $url=array();
	protected $line=array();
	protected $header=array();
	protected $body=array();
	protected $version='HTTP/1.1';
	protected $fh=null;
	protected $response='';
	public function __construct($url){
		$this->conn($url);
		$this->setHeader('Host: '.$this->url['host']);
	}
	/**
	 * 设置请求行信息
	 * @param string $method 方法名 e.g GET POST
	 */
	protected function setLine($method){
    	$this->line[0]=$method.' '.$this->url['path'].'?'.(isset($this->url['query'])? $this->url['query']:'').' '.$this->version;
	}
	/**
	 * 设置请求头信息
	 * @param string $headerLine 常见的请求头信息
	 */
	protected function setHeader($headerLine){
		$this->header[]=$headerLine;
	}
	/**
	 * 设置主体信息
	 * @param array $body 传输的数据
	 */
	protected function setBody($body=array()){
		$this->body[]=http_build_query($body);

	}
	/**
	 * 分析url各个部分,并打开一个网络连接
	 * @param  string $url 
	 * @return 
	 */
	public function conn($url){
		$this->url=parse_url($url);
		if(!isset($this->url['port'])){
             $this->url['port']=80;
		}
		$this->fh=fsockopen($this->url['host'],$this->url['port']);
	}
	/**
	 * 发送get查询
	 * @return [type] [description]
	 */
	public function get(){
		$this->setLine('GET');
		$this->request();
		return $this->response;
	}
	/**
	 * post查询
	 * @param  array  $body 请求主题
	 * @return 返回相应的数据
	 */
	public function post($body=array()){
		$this->setLine('POST');
		$this->setHeader('Content-Type: application/x-www-form-urlencoded');
		$this->setBody($body);
		$this->setHeader('Content-Length: '.strlen($this->body[0]));
		$this->request();
		return $this->response;

	}
    /**
     * 合并请求行请求头，主体信息，发送请求，读取远程文件
     * @return 
     */
	public function request(){
		set_time_limit(0);
		$req=array_merge($this->line,$this->header,array(''),$this->body,array(''));
		$req=implode(self::CRLF,$req);
		/*echo $req;
		exit;*/
		fwrite($this->fh,$req);

		while(!feof($this->fh)){
			$this->response.=fread($this->fh,2048);
		}
		$this->close();
		
	}
	/**
	 * 关闭连接，释放资源
	 * @return [type] [description]
	 */
	public function close(){
		fclose($this->fh);
	}
}

$url="http://php.net/manual/zh/function.parse-url.php";
$http=new Http($url);
//echo $http->get();
$str=str_shuffle('fsjiwerorwjeworrj2323423t435');
$tit=substr($str, 0,5);
$email=substr($str,6,9);

$body=array('name'=>$tit,'email'=>$email);
 echo $http->post($body);  


//E:\phpStudy\WWW\http>E:\phpStudy\php56n\php.exe ./http.php
//hello
