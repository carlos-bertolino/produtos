 </div>
    <!-- /container -->
 
<!-- jQuery library -->
<script src="libs/js/jquery-3.2.0.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="libs/css/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="libs/css/bootstrap/docs-assets/js/holder.js"></script>
 
<!-- bootbox library -->
<script src="libs/js/bootbox.min.js"></script>
 
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
// JavaScript for deleting product
$(document).on('click', '.delete-object', function(){
 
    var id = $(this).attr('delete-id');
 
    bootbox.confirm({
        message: "<h4>Você tem certeza?</h4>",
        buttons: {
            confirm: {
                label: '<span class="glyphicon glyphicon-ok"></span> Sim',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="glyphicon glyphicon-remove"></span> Não',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
 
            if(result==true){
                $.post('product_delete1.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Não é possível excluir.');
                });
            }
        }
    });
 
    return false;
});
</script>
 
</body>
</html>