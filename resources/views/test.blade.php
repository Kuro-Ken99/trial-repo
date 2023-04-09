<form action="test/pokemon" method="POST">
<input type="text" name="id">
@csrf
<button type="submit">送信</button>
</form>
{{-- <?php
var_dump(session('pokemon'));
?> --}}
@if ((session('pokemon')) !== null)
<?php
print_r('<pre>');
print_r(session('pokemon'));
print_r('</pre>');
// var_dump(session('pokemon'));
?>
{{-- {{session('pokemon')->sprites->front_default}} --}}
@endif