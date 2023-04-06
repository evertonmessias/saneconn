<?php

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

//print_r($array_cat);
//print_r($array_val);

$array_categorias = ['CAM','COM','CON','ENT','HOC','HOP','IND','ITR','PES','PMU','PNM','POC','RES','SOC','TAR','TER'];

for($i=0;$i<count($array_categorias);$i++){
    
    for($i=0;$i<count($array_categorias);$i++){


        
    }


}




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