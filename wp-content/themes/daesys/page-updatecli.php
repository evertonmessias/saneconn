<?php
if (isset($_POST['intervalo']) && $_POST['intervalo'] == 'ano') {

    global $wpdb;

    $ano = date('Y');

    $array_nome_meses = ["janeiro", "fevereiro", "marco", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];

    $array_datai = [
        "01.01.$ano",
        "01.02.$ano",
        "01.03.$ano",
        "01.04.$ano",
        "01.05.$ano",
        "01.06.$ano",
        "01.07.$ano",
        "01.08.$ano",
        "01.09.$ano",
        "01.10.$ano",
        "01.11.$ano",
        "01.12.$ano"
    ];

    $array_dataf = [
        "31.01.$ano",
        "28.02.$ano",
        "31.03.$ano",
        "30.04.$ano",
        "31.05.$ano",
        "30.06.$ano",
        "31.07.$ano",
        "31.08.$ano",
        "30.09.$ano",
        "31.10.$ano",
        "30.11.$ano",
        "31.12.$ano"
    ];

    if (($ano%4==0 && $ano%100!=0) || $ano%400 == 0){
        $array_dataf[1] = "29.02.$ano";
    }

    $table_name = $wpdb->prefix . 'clientes_ativos';

    $conn = DAE::firebird();

    $f=intval(date('m'));

    for ($i = 0; $i < $f; $i++) {

        $datai = $array_datai[$i];
        $dataf = $array_dataf[$i];

        $mes = $array_nome_meses[$i];

        $sql1 = "EXECUTE PROCEDURE PR_LISTA_LIGACOES('$datai','$dataf')";

        $conn->exec($sql1);

        $sql2 = "SELECT COUNT(LIG_L_EST) FROM LIGACOES WHERE LIG_L_EST LIKE 'T';";

        $query = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);

        $clientes_ativos = number_format($query[0]['COUNT'], 0, '', '.');

        $sql3 = "UPDATE $table_name SET $mes = $clientes_ativos WHERE `ano` = $ano;";

        $wpdb->query($sql3);
    }

    $dataii = '01.01.'.$ano;
    $dataff = '31.12.'.$ano;
    
    $sql4 = "EXECUTE PROCEDURE PR_LISTA_LIGACOES('$dataii','$dataff');";
    
    $conn = DAE::firebird();
    
    $conn->exec($sql4);
    
    $sql5 = "SELECT CATEGGORIA_ECONOMIA, COUNT(CATEGGORIA_ECONOMIA) FROM LIGACOES WHERE LIG_L_EST LIKE 'T' GROUP BY CATEGGORIA_ECONOMIA ORDER BY CATEGGORIA_ECONOMIA ASC;";
    
    $list_cat = $conn->query($sql5)->fetchAll(PDO::FETCH_ASSOC);
    
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

    $table_name2 = $wpdb->prefix . 'clientes_cat';
    $sql6 = "UPDATE $table_name2 SET `CAM` = $array_valores[0],`COM` = $array_valores[1],`CON` = $array_valores[2],`ENT` = $array_valores[3],`HOC` = $array_valores[4],`HOP` = $array_valores[5],`IND` = $array_valores[6],`ITR` = $array_valores[7],`PES` = $array_valores[8],`PMU` = $array_valores[9],`PNM` = $array_valores[10],`POC` = $array_valores[11],`RES` = $array_valores[12],`SOC` = $array_valores[13],`TAR` = $array_valores[14],`TER` = $array_valores[15] WHERE `ano` = $ano;";
    $wpdb->query($sql6);

    echo "OK";

} else {
    echo "ASSESSOR ERRO";
}
