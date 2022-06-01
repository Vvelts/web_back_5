<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание_5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-dark">
    <div class="container-fluid">
        
        <div class="items d-flex flex-column">

        <?php

            if (!empty($messages)) {
        ?>
             <div class="row d-flex flex-row justify-content-center mt-3 order-sm-3">
                <div class="col-sm-9 content">
                    <div class="items d-flex flex-column ">
                        <div class="order-sm-3" style="padding: 10px;">
                            <?php

                                foreach ($messages as $message) {
                                    echo $message . "<br>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

            <div class="row d-flex flex-row justify-content-center mt-3 order-sm-3">
                <div class="col-sm-9 content">
                    <div class="items d-flex flex-column ">
                        <div id="form" class="order-sm-3">
                             <h2 class="text-center">Форма</h2>
                              <form action="" method="POST">
                                    <input type="hidden" name="edit_proc" value="<?php echo (isset($id) ? $id : '') ?>">
                                    <label>
                                        Имя:<br />
                                        
                                        <input name="name" <?php if ($errors['name'] || $errors['1']) {print "class='error'" ;} ?> value="<?php print $values['name']; ?>" />
                                    </label><br />
    
                                    <label>
                                        E-mail:<br />
                                        
                                        <input name="email" <?php if ($errors['email'] || $errors['2']) {print 'class="error"' ;} ?> value="<?php print $values['email']; ?>"  />
                                    </label><br />
    
                                    <label>
                                        День рождения:<br />
                                        
                                        <input name="date" type="date" <?php if ($errors['date']) {print 'class="error"' ;} ?> value="<?php print $values['date']; ?>" />
                                    </label><br />
                                    Пол:<br />
                                    <label>
                                        <input type="radio" name="radio-group-1" <?php if ($errors['radio-group-1']) {print 'class="error"' ;} if($values['radio-group-1']=="m"){print "checked='checked'";}?> value="m" />
                                        Муж.</label>
                                    <label>
                                        <input type="radio" name="radio-group-1" <?php if ($errors['radio-group-1']) {print 'class="error"' ;} if($values['radio-group-1']=="f"){print "checked='checked'";}?> value="f" />
                                        Жен</label><br />
                                    Кол-во конечностей:<br />
                                    <label>
                                        <input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="1"){print "checked='checked'";}?> value="1" />
                                        1</label>
                                    <label>
                                        <input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="2"){print "checked='checked'";}?> value="2" />
                                        2</label>
                                    <label>
                                        <input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="3"){print "checked='checked'";}?> value="3" />
                                        3</label>
                                    <label>
                                        <input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="4"){print "checked='checked'";}?> value="4" />
                                        4</label><br />    
                                        
                                    <label>
                                         Сверхспособности:
                                        <br />
                                        <select name="superpowers[]" multiple="multiple">
                                        <option value="inf" 
                                        <?php if(in_array("inf", $values['superpowers'])){
                                            print "selected='selected'";}
                                        ?>>Бессмертие</option>
                                        <option value="levitation" 
                                        <?php if(in_array("levitation", $values['superpowers'])){
                                            print "selected='selected'";}
                                        ?>>Левитация</option>
                                        <option value="through" 
                                        <?php if(in_array("through", $values['superpowers'])){
                                            print "selected='selected'";}
                                        ?>>Прохождение сквозь стены</option>
                                        </select>
                                    </label><br />
                                    <label>
                                        Биография:<br />
                                        <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"' ;} ?>><?php print $values['biography']; ?></textarea> 
                                    </label><br />
                                    Ознакомлен с условиями:<br />
                                    <label>
                                        <input type="checkbox" name="check-1" <?php  if($values['check-1']=="Y"){print "checked='checked'";}?> value="Y" />
                                        Согласен с условиями</label><br /> 
                                    
                                    <input type="submit" value="Отправить" />
                                </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        
    </div>
</body>

</html>