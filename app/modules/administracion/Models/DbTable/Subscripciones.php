<?php 
/**
* clase que genera la insercion y edicion  de suscripción en la base de datos
*/
class Administracion_Model_DbTable_Subscripciones extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'subscripciones';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'subscripcion_id';

	/**
	 * insert recibe la informacion de un suscripción y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$subscripcion_name = $data['subscripcion_name'];
		$subscripcion_phone = $data['subscripcion_phone'];
		$subscripcion_email = $data['subscripcion_email'];
		$subscripcion_date = $data['subscripcion_date'];
		$subscripcion_state = $data['subscripcion_state'];
		$query = "INSERT INTO subscripciones( subscripcion_name, subscripcion_phone, subscripcion_email, subscripcion_date, subscripcion_state) VALUES ( '$subscripcion_name', '$subscripcion_phone', '$subscripcion_email', '$subscripcion_date', '$subscripcion_state')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un suscripción  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$subscripcion_name = $data['subscripcion_name'];
		$subscripcion_phone = $data['subscripcion_phone'];
		$subscripcion_email = $data['subscripcion_email'];
		$subscripcion_date = $data['subscripcion_date'];
		$subscripcion_state = $data['subscripcion_state'];
		$query = "UPDATE subscripciones SET  subscripcion_name = '$subscripcion_name', subscripcion_phone = '$subscripcion_phone', subscripcion_email = '$subscripcion_email', subscripcion_date = '$subscripcion_date', subscripcion_state = '$subscripcion_state' WHERE subscripcion_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}