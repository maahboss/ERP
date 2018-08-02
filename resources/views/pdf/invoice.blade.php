
	
	   <img src="{{ public_path("uploads/sample.png")}}" width=auto; height="200";>

	   <div style="position: relative">
                

                <img src="{{ public_path("uploads/PdfFotter.png")}}" style="position: fixed; bottom: 50px; width:100%; text-align: center">
        </div>

        <table>
        	<thead>
        	  <tr>
        		<th>date</th>
        		<th>title</th>
        		<th>subject</th>
        	  </tr>
        	</thead>
           </br>
        	<tbody>
        	@foreach($letters as $key=>$letter)
        		<tr>
        			<td>{{$letters->date}}</td>
        			<td>{{$letters->title}}</td>
        			<td>{{$letters->subject}}</td>
        		</tr>
        	@endforeach 
        	</tbody>
        </table>
	  
 


