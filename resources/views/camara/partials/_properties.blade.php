<thead>
  <tr>
  @foreach ($columns as $prop ) 
    <th>{{{ ucfirst($prop) }}}</th>
  @endforeach
    <th width="90%"><!-- spacer --></th>
    <th><!-- actions --></th>
  </tr>
</thead>