<?php

echo "TESTE";
/*
$datai = '01.01.2023';
$dataf = '31.12.2023';

$sql1 = "EXECUTE PROCEDURE PR_LISTA_LIGACOES('$datai','$dataf');";

$conn = DAE::firebird();

$conn->exec($sql1);

$sql2 = "SELECT CATEGGORIA_ECONOMIA, COUNT(CATEGGORIA_ECONOMIA) FROM LIGACOES WHERE LIG_L_EST LIKE 'T' GROUP BY CATEGGORIA_ECONOMIA ORDER BY CATEGGORIA_ECONOMIA ASC;";

$list_cat = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);

$array_cat = [];
$array_val = [];


foreach($list_cat as $key => $val){
    $array_cat[] = substr($val['CATEGGORIA_ECONOMIA'],0,3);
    $array_val[] = $val['COUNT'];
}

$array_categorias = ['CAM','COM','CON','ENT','HOC','HOP','IND','ITR','PES','PMU','PNM','POC','RES','SOC','TAR','TER'];
$array_valores = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

for($i=0;$i<count($array_categorias);$i++){
    for($x=0;$x<count($array_cat);$x++){
        if($array_categorias[$i] == $array_cat[$x]){
            $array_valores[$i] = $array_val[$x];
        }     
    }
}

echo implode(',',$array_valores);
*/


/*
$table_cat = 'wp_clientes_cat';

$list_cat = list_data("SELECT CAM,COM,CON,ENT,HOC,HOP,IND,ITR,PES,PMU,PNM,POC,RES,SOC,TAR,TER from $table_cat;");

$string_clientes_cat_2021 = "";
$string_clientes_cat_2022 = "";
$string_clientes_cat_2023 = "";

foreach ($list_cat[0] as $key => $val) {    
    $string_clientes_cat_2021 .= $val . ',';
}

foreach ($list_cat[1] as $key => $val) {    
    $string_clientes_cat_2022 .= $val . ',';
}

foreach ($list_cat[2] as $key => $val) {    
    $string_clientes_cat_2023 .= $val . ',';
}

echo '<br>'.$string_clientes_cat_2021;
echo '<br>'.$string_clientes_cat_2022;
echo '<br>'.$string_clientes_cat_2023;
*/