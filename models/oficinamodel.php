<?php

class oficinaModel extends mysql
	{
		// Datos Transferencia

		private $strWallet;
		private $strUser;

		 public function __construct()
		{
			parent::__construct();
		}

		public function findWallet(string $wallet, string $user, int $free, int $monto, int $saldo, string $from)
		{
			$this->strWallet = $wallet;
			$this->strUser = $user;
			$this->intFee = $free;
			$this->intmonto = $monto;
			$this->intSaldo = $saldo;
			$this->strFrom = $from;

			$user_id = seD:: decryption($this->strUser);

			$sql = "SELECT * FROM billetera WHERE direccion = '{$this->strWallet}' ";
			$request = $this->select_All($sql);

			if ($this->intmonto > $this->intSaldo) {
				$return = 'saldoi';
			}
			elseif (!is_numeric($this->intmonto)) {
				$return = 'montowrong';
			}
			elseif (!$request) {
				$return = 'nowallet';
			}else{
				$nuevo_saldo_from = $this->intSaldo - $this->intmonto;

				$sql = "UPDATE billetera set saldo = ? WHERE direccion = '{$this->strWallet}'";
				$arrData = array($nuevo_saldo_from);
				$request = $this->update($sql, $arrData);
				$return = 'funciono';
			}

			return $return;


		} 

	}/// END MODEL



?>