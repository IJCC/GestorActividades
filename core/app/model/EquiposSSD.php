<?php
class EquiposSSD {
	public static $tablename = "pc_ssd";

	public function __construct(){
		$this->equipo = "";
		$this->bm = "";
		$this->numero_serie = "";
		$this->tipo_ssd = "";
		$this->usuario = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into pc_ssd (equipo,bm,numero_serie,tipo_ssd,usuario,created_at) ";
		$sql .= "value (\"$this->equipo\",\"$this->bm\",\"$this->numero_serie\",\"$this->tipo_ssd\",\"$this->usuario\",$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set equipo=\"$this->equipo\",bm=\"$this->bm\",numero_serie=\"$this->numero_serie\",tipo_ssd=\"$this->tipo_ssd\",usuario=\"$this->usuario\" where id=$this->id";
		Executor::doit($sql);
	}
/*Hacer pruebas desde aqui 
	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}
*/
	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquiposSSD());
	}

	public static function getByDate($date){
		$sql = "select count(*) as cnt from ".self::$tablename." where date(created_at)= \"$date\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquiposSSD());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquiposSSD());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquiposSSD());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquiposSSD());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquiposSSD());
	}
/*Hacer pruebas hasta aqui */

}

?>