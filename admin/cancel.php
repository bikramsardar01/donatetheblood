<?php
  session_start();
    require_once 'class/Booking.php';
    $order = new Booking();
    $order->updatecnlBooking('cancelled', $_GET['canid']);
    header('location: ../index.php');
?>