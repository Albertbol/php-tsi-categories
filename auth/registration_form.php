<?php include $_SERVER['DOCUMENT_ROOT'].'/components/header.php';?>

<form action="registration.php" method="post">
  <h1>Registration Form</h1>
* Name: 
<br>
<input type="text" name="name" placeholder="Input your name" required>
<br>
* Surname: 
<br>
<input type="text" name="surname" required>
<br>
* E-mail: 
<br>
<input type="email" name="email" pattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/" title="Please provide right email address" required>
<br>
* Password: 
<br>
<input type="password" name="password" pattern=".{8,15}" title="Minimum 8 characters maximum 15" required >
<?php $date = date('d-m-Y')?>
<input type="hidden" name="date" value="<?php echo $date?>" class='hidden'>
<fieldset required>
    <legend>Age:</legend>
    <input name="age" id="0" value="0" type="radio">
    <label >< 10</label>
    <input name="age" id="10" value="10" type="radio">
    <label >10 - 19</label>
    <input name="age" id="20" value="20" type="radio">
    <label >20 - 29</label>
    <br>
    <input name="age" id="30" value="30" type="radio">
    <label >30 - 39</label>
    <input name="age" id="40" value="40" type="radio">
    <label >40 - 49</label>
    <input name="age" id="50" value="50" type="radio">
    <label >>= 50</label>
  </fieldset>
  <fieldset>
    <legend>Hobby:</legend>
    <input name="auto" id="auto" type="checkbox">
    <label >auto</label>
    <input name="garden" id="garden" type="checkbox">
    <label >garden</label>
    <input name="sport" id="sport" type="checkbox">
    <label >sport</label>
    <br>
    <input name="books" id="books" type="checkbox">
    <label >books</label>
    <input name="art" id="art" type="checkbox">
    <label >art</label>
    <input name="music" id="music" type="checkbox">
    <label >music</label>
  </fieldset>
  <input type="submit" value="OK">
  <button type="button">Cancel</button>
</form>

<?php include $_SERVER['DOCUMENT_ROOT'].'/components/footer.php';?>

<style>
    form {
        border-style: double;
        max-height: 600px;
        max-width: 600px;
    }
    .hidden {
      visibility: hidden;
    }
</style>

