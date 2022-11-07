<?php

$GLOBALS['administrator'] = 0; // Administrator
$GLOBALS['cs']            = 1; // Sales
$GLOBALS['backroom']      = 2; // TL and HD
$GLOBALS['deployment']    = 3; // Pembangunan / SDI
$GLOBALS['guest']         = 4; // Tamu
$GLOBALS['manajemen']     = 5; // Manajemen

/* ------------------------ */
/* -------- LOGIN ---------- */
/* ------------------------ */

function loginAksesProvi($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['cs'] || $level == $GLOBALS['backroom'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

/* ------------------------ */
/* -------- MENU ---------- */
/* ------------------------ */

function menuOrderProvi($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['backroom'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function menuCekOnu($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['backroom'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function menuBaOnline($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function menuBarcode($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['backroom'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function menuReport($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function menuUserWeb($level)
{
    if ($level == $GLOBALS['administrator']) {
        return true;
    } else {
        return false;
    }
}

function menuUserBotSales($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['cs'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function menuUserBotTeknisi($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['backroom'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function menuUserBotHelpdesk($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}


/* ------------------------ */
/* -------- CRUD ---------- */
/* ------------------------ */

function cannotDelete($level)
{
    if ($level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}

function adminOnly($level)
{
    if ($level == $GLOBALS['administrator']) {
        return true;
    } else {
        return false;
    }
}

//Akses CRUD Teknisi Input Datel dan Kategori
function crudTeknisi($level)
{
    if ($level == $GLOBALS['administrator'] || $level == $GLOBALS['manajemen']) {
        return true;
    } else {
        return false;
    }
}
