<style>
    table{
        border-spacing: 0;
    }
    td,th{
        border: 1px solid #000;
        padding: 5px;
    }
    th{
        background: #ccc;
    }
</style>
<?php

//$sql = "SELECT tablespace_name, table_name, owner FROM dba_tables;";

//$sql = "SELECT DATA,NOME_DETALHE,VALOR,TIPO,EXERCICIO FROM MOVIMENTO_EMPENHOS_RECEITAS WHERE (TIPO LIKE 'RECEITA' OR TIPO LIKE 'PAGAMENTO') AND EXERCICIO LIKE '2023' AND DATA BETWEEN TO_DATE('01-JAN-2023','DD-MON-YYYY') AND TO_DATE('31-DEC-2023','DD-MON-YYYY') ORDER BY 1 ASC;";

//$sql = "SELECT * FROM FUNCIONARIO WHERE INATIVO = 0 ORDER BY 1 ASC;";

//echo DAE::oracleTest($sql);

$datai = '01.01.2023';
$dataf = '31.12.2023';

$sql = "EXECUTE PROCEDURE PR_LISTA_LIGACOES('$datai','$dataf');";
    
$conn = DAE::firebird();

$conn->exec($sql);

$sql2 = "SELECT COUNT(CATEGGORIA_ECONOMIA) FROM LIGACOES WHERE LIG_L_EST LIKE 'T' GROUP BY CATEGGORIA_ECONOMIA;";

$list_cat = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($list_cat);