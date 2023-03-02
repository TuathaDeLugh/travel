<?php
function alert($status,$text){
        ?><script>
        new Notify({
    status: '<?php echo $status; ?>',
    title: 'Database',
    text: '<?php echo $text; ?>',
    effect: 'slide',
    speed: 500,
    customClass: null,
    customIcon:null,
    showIcon: true,
    showCloseButton: true,
    autoclose: true,
    autotimeout: 3000,
    gap: 20,
    distance: 20,
    type: 1,
    position: 'right top'
  })    
        </script>
        <?php } 


if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(empty($name) || empty($email) || empty($message)){
        alert("error", "Please Put Data");
    } else {


        try {
            $q = "INSERT INTO `contact` (`c_no`, `name`, `email`, `message`) VALUES(NULL,'$name','$email','$message')";
            $query = mysqli_query($con, $q);
            alert("success", "We will mail you on $email");
        } catch (Exception) {
            alert("error", "Please Put Data");
        }
    }
}

if (isset($_POST['call'])) {
    try {
        $mno = $_POST['mno'];
        $q = "INSERT INTO `calls` (`mno`) VALUES($mno)";
        $query = mysqli_query($con, $q);
        alert("success", "We will call you on $mno");
    } catch (Exception) {
        alert("error", "Please Put Mobile no");
    }
}