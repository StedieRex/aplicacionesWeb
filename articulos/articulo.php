<?php
class articulo{
    public $conn;

    public function __construct(){
        $this->conn = new sql();
    }

    public function insertarArticulo($id, $nom, $costo){
        $sql = "insert into articulo values('$id','$nom','$costo')";
		//echo $sql ."<br><br>";
        $this->conn->ejecutar($sql);
		echo "ok";
    }   
    public function actualizarArticulo($id,$nom,$costo)
    {
        $sql = "update articulo set nom = '$nom', costo = '$costo' where id = '$id'";
        $this->conn->ejecutar($sql);
    }
    public function eliminarArticulo($id)
    {
        $sql = "delete from articulo where id = '$id'";
        $this->conn->ejecutar($sql);
    }
  
	public function table()
	{
		$sql = "select * from articulo";
		$result = $this->conn->ejecutar($sql);

		$line = '
		<table class="table table-borderless">
		<tr>
			<th style="background-color: rgba(255,255,255,0.55);">ID</th>
			<th style="background-color: rgba(255,255,255,0.55);">Nombre</th>
			<th style="background-color: rgba(255,255,255,0.55);">Costo</th>
			<th class="text-center" style="background-color: rgba(255,255,255,0.55);">Boton de insertar</th>
			<th class="text-center" style="background-color: rgba(255,255,255,0.55);">Boton de eliminación</th>
		</tr>';
		if($result->num_rows>0)
		{
			while($row = $result->fetch_assoc())
			{
				$line .="<tr>";
				$line .='<td style="background-color:rgba(255,255,255,0.55);">' . $row["id"]. "</td>";
				$line .='<td style="background-color:rgba(255,255,255,0.55);">' . $row["nom"]. "</td>";
				$line .='<td style="background-color:rgba(255,255,255,0.55);">' . $row["costo"]. "</td>";
				$line .='<td class="text-center"  style="background-color:rgba(255,255,255,0.55);">
					<button type="button" class="btn btn-primary" onclick="actualizar(' . $row["id"].')">
						<img src="img/edit.svg" alt="">
					</button>
				</td>
				<td class="text-center" style="background-color:rgba(255,255,255,0.55);">
					<button type="button" class="btn btn-danger" onclick="eliminar(' . $row["id"].')">
						<img src="img/delete.svg" alt="">
					</button>
				</td>';
				$line .="</tr>";
			}
			$line .="</table>";
		}
		return $line;
	}
	
	function buscar($id)
	{
		$sql = "select * from articulo where id='" .$id. "'";
		$result = $this->conn->ejecutar($sql);

		$obj = new stdClass();
		if($result->num_rows>0)
		{
			while($row = $result->fetch_assoc()){
				$obj->id = $row["id"];
				$obj->nom = $row["nom"];
				$obj->costo = $row["costo"];
			}
		}
		return $obj;
	}
}
?>