<?php
// search form
echo "<form role='search' action='product_search.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
        echo "<input type='text' class='form-control' placeholder='Nome do produto ou decrição...' name='s' id='srch-term' required {$search_value} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";

// create product button
echo "<div class='right-button-margin'>";
    echo "<a href='product_create.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Cadastrar Produto";
    echo "</a>";
echo "</div>";

// display the products if there are any
if($total_rows>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Produto</th>";
            echo "<th>Preço</th>";
            echo "<th>Descrição</th>";
            echo "<th>Categoria</th>";
            echo "<th>Ações</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$price}</td>";
                echo "<td>{$description}</td>";
                echo "<td>";
                    $category->id = $category_id;
                    $category->readName();
                    echo $category->name;
                echo "</td>";

                echo "<td>";

                    // read product button
                    echo "<a href='product_view.php?id={$id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Exibir";
                    echo "</a>";

                    // edit product button
                    echo "<a href='product_update.php?id={$id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Alterar";
                    echo "</a>";

                    // delete product button
                    echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Excluir";
                    echo "</a>";

                echo "</td>";

            echo "</tr>";

        }

    echo "</table>";

    // paging buttons
    include_once 'paging.php';
}

// tell the user there are no products
else{
    echo "<div class='alert alert-danger'>Nenhum produto encontrado.</div>";
	echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
    echo "<span class='glyphicon glyphicon-plus'></span>Listar Produtos";
    echo "</a>";
    echo "</div>";
}
?>