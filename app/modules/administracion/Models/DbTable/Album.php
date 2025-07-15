<?php 
/**
* clase que genera la insercion y edicion  de álbum en la base de datos
*/
class Administracion_Model_DbTable_Album extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'album';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'album_id';

	/**
	 * insert recibe la informacion de un álbum y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$album_nombre = $data['album_nombre'];
		$album_fecha = $data['album_fecha'];
		$album_imagen = $data['album_imagen'];
		$album_estado = $data['album_estado'];
		$album_descripcion = $data['album_descripcion'];
		$query = "INSERT INTO album( album_nombre, album_fecha, album_imagen, album_estado, album_descripcion) VALUES ( '$album_nombre', '$album_fecha', '$album_imagen', '$album_estado', '$album_descripcion')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un álbum  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$album_nombre = $data['album_nombre'];
		$album_fecha = $data['album_fecha'];
		$album_imagen = $data['album_imagen'];
		$album_estado = $data['album_estado'];
		$album_descripcion = $data['album_descripcion'];
		$query = "UPDATE album SET  album_nombre = '$album_nombre', album_fecha = '$album_fecha', album_imagen = '$album_imagen', album_estado = '$album_estado', album_descripcion = '$album_descripcion' WHERE album_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}