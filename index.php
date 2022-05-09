<?php

/**
 * Зробіть форму, в якій буде велике поле
введення тексту. При надсиланні форми ви повинні
видати людині унікальний код Якщо ж на вашу сторінку
заходять на посилання index.php?id=%цей_код%,
то ви повинні у цьому великому полі введення
відобразити текст, який був заданий раніше.
Редагувати його вдруге вже не можна.
Зробіть це все через збереження файлу.
 */
$data = '';
chdir('text_files');    //Встановлюємо поточною директорією ту, яка містить файли.
if(isset($_POST['code'])){
    $uniq_filename = uniqid();
    file_put_contents($uniq_filename, $_POST['code']);
    echo "Ваш код: {$uniq_filename} ";
    echo "<a href='index.php?id={$uniq_filename}'>Посилання на код</a>";
    exit;
}
//перевірка щоб не ввели шлях на сервері
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(file_exists($id)){
        $data = file_get_contents($id);
    }
}

?>

<form method="post" action="">
    <textarea name="code" cols="40" rows="10"
        <?php if($data){?> disabled <?php }?>
    ><?php
        echo htmlspecialchars($data);

        ?></textarea><br>
    <input type="submit" value="Добавить" />
</form>



