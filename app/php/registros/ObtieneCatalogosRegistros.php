<?php
/**
 * Created by PhpStorm.
 * User: Josue Garcia
 * Date: 3/11/2017
 * Time: 12:32 AM
 * 03/18/2017 Se cambia para que la consulta regrese todos los elementos del catalogo de modo que se optimice la carga inicial de la interfaz
 *
 */
header("Content-Type: application/json");
include '../../../config.php';
include '../opendb.php';
//Sección para los tipos de catalogo
//solo se ocupan para referencia
$CAT_PROVENIENCIA=1;
$CAT_ESCOLARIDAD=2;
$CAT_OCUPACION=3;
$CAT_TIPO_DE_CANCER=4;
$CAT_OTROS_TIPOS_DE_CANCER=5;
$CAT_GRADO_DEL_FAMILIAR_CON_CANCER=6;
$CAT_ANIO_DE_DIAGNOSTICO=7;
$CAT_ANIOS_DE_TABAQUISMO=8;
$CAT_CANTIDAD_CIGARROS_AL_DIA=9;
$CAT_ESCOLARIDAD_EN_ANIOS=10;
$CAT_MODALIDAD_DEL_DIAGNOSTICO=11;
$CAT_SINTOMAS=12;
$CAT_NUMERO_DE_CILINDROS_POR_BIOPSIA=13;
$CAT_OTROS_MARCADORES=14;
$CAT_ETAPIFICACION_CLINICA_T=15;
$CAT_ETAPIFICACION_CLINICA_N=16;
$CAT_PET=17;
$CAT_GGO=18;
$CAT_TAC=19;
$CAT_RMI=20;
$CAT_ETAPIFICACION_CLINICA_M=21;

//$id=$_REQUEST['catalog'];
$results=null;
$catalogos = array();
    //$sql = "SELECT IDID_OPCION_CAMPO, ETIQUETA_OPCION_CAMPO  FROM cantprostdbC_RELACION_REGISTROS where ID_REGISTRO=-1 AND ID_TIPO_CAMPO=$id;";
$sql = "SELECT distinct ID_TIPO_CAMPO FROM cantprosdb.C_RELACION_REGISTROS where ID_REGISTRO=-1";
$results = getSelectV($conexion, $sql);
foreach ($results as $row ){
    $IdCatalogo = $row["ID_TIPO_CAMPO"];
    if (!in_array('campo_' . $IdCatalogo, $catalogos)) $catalogos['campo_' . $IdCatalogo] = array();
    //array_push($catalogos['campo_' . $IdCatalogo], $row);
}

$sql = "SELECT ID_TIPO_CAMPO, ID_OPCION_CAMPO, ETIQUETA_OPCION_CAMPO  FROM cantprosdb.C_RELACION_REGISTROS where ID_REGISTRO=-1";
$results = getSelectV($conexion, $sql);
foreach ($results as $row ){
    $IdCatalogo = $row["ID_TIPO_CAMPO"];
    array_push($catalogos['campo_' . $IdCatalogo], $row);
}

echo json_encode($catalogos);
?>