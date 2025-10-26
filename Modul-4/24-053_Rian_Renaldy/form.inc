<form action="form.php" method="POST">
    <label>Nama:</label>
    <input type="text" name="surname" value="<?= htmlspecialchars($data['surname'] ?? ''); ?>">
    <span style="color:red;"><?php echo $errors['surname'] ?? ""?></span>
    <br><br>

    <label>Email:</label>
    <input type="text" name="email" value="<?= htmlspecialchars($data['email'] ?? ''); ?>">
    <span style="color:red;"><?php echo $errors['email'] ?? ""?></span>
    <br><br>
            
    <label>Tanggal Lahir (DD-MM-YYYY)::</label>
    <input type="text" name="birthdate" value="<?= htmlspecialchars($data['birthdate'] ?? ''); ?>">
    <span style="color:red;"><?php echo $errors['birthdate'] ?? ""?></span>
    <br><br>

    <input type="submit" value="Submit">
</form>