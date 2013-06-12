<?php namespace T4s\CamelotAuth\Auth\Oauth1Client\Signatures;



abstract class AbstractSignature
{

	protected $clientSecret;

	protected $name;

	public function __constructor($clientSecret)
	{
		$this->clientSecret = $clientSecret;
	}


	/**
	* Return the value of any protected class variables.
	*
	* $name = $signature->name;
	*
	* @param string variable name
	* @return mixed
	*/
	public function __get($key)
	{
		return $this->$key;
	}

	public function key($token = null)
	{
		$key = rawurlencode($this->clientSecret).'&';

		if($token)
		{
			$key .=rawurlencode($token->secret);
		}

		return $key;
	}

	abstract public function sign($request,$token = null);

	abstract public function verify($signature,$request,$token = null);
}

