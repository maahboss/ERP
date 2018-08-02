



    <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
                body {font-family: 'ar';}
            </style>
        </head>

        <body>


    
       <img src="{{ public_path("uploads/sample.png")}}" width=auto; height="200";>

       <div style="position: relative">
                

                <img src="{{ public_path("uploads/PdfFotter.png")}}" style="position: fixed; bottom: 50px; width:100%; text-align: center">
        </div>

        
                  

                   <p></p>


                   <p align="right"  >{{$letters->date}} ابحرم </p>


                    
                    {{$letters->title}}
                    {{$letters->subject}}
               
 


  </body>
  </html>