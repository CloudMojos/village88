<?php header('Content-type: text/css'); ?>


body {
    display: flex;
    justify-content: end;
    height: 100vh;
    background-image: url("img/bg-1.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    .content {
        position: relative;
        .title {
            position: absolute;
            top: 20px;
        }
        padding: 25px;
        width: 30%;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
    }
}