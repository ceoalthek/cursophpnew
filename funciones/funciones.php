<?php 

/*
function funcitonejemplo($args=0)
{

	return 1
}
*/

  // <script>
  //   $(document).ready(function()
  //   {
  //     //Nuevo Artículo
  //     $('#fNewArticle').on('submit',function()
  //     {
  //       HoldOn.open({
  //           theme:'sk-bounce',
  //           textColor:"white",
  //           message:"<h4>Wait a minute...</h4>"
  //       }); 

  //       var formData = new FormData($(this)[0]);
  //       $f = $(this);
  //       if ($f.data('locked') == undefined || !$f.data('locked'))
  //       {
  //           $.ajax({
  //               url: '{path}process/newArt',
  //               type: 'POST',
  //               data: formData,
  //               beforeSend: function(){ $f.data('locked', true); },
  //               success: function(resp)
  //               {                    
  //                   var a = JSON.parse(resp)

  //                   HoldOn.close();

  //                   alert(a['error']);

  //                   if (a['codigo']=="0")
  //                   {
  //                     $('#fNewArticle')[0].reset();
  //                   }
  //               },
  //               cache: false,
  //         contentType: false,
  //         processData: false,
  //               complete: function(){ $f.data('locked', false) }
  //           });
  //       }
  //     });       
  //   });
  // </script>



//FUNCIONES  ANIDADAS
function uno()
{

 function dos()
 {
    echo "No existo hasta que se llame a uno().";
  }

}

uno();

dos();



/*---------------------------------------------------------------------------------*/
//ARGUMENTOS
//func_num_args() 

function ejemplo()
{
    $numargs = func_num_args();
    echo "Número de argumentos: $numargs\n";
}

ejemplo(1, 2, 3, 4, 5,6,7,8);  

func_get_arg(nr)
function ejemplo()
{
     $numargs = func_num_args();
     echo "Número de argumentos: $numargs<br />\n";
     if ($numargs >= 2) {
         echo "El segundo argumento es: " . func_get_arg(6) . "<br />\n";
     }
}

ejemplo (1, 2, 3,4,5,6,7,8);

func_get_args() un array de argumentos

function ejemplo()
{
    $numargs = func_num_args();
    echo "Número de argumentos: $numargs<br />\n";
    if ($numargs >= 2) {
        echo "El segundo argumento es: " . func_get_arg(1) . "<br />\n";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        echo "El argumento $i es: " . $arg_list[$i] . "<br />\n";
    }
}

ejemplo(1, 2, 3);


/*
----------------------------------------------------------------------------------------------------


?>