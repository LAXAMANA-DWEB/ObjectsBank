<?php
// Author: Laxamana, Prince S.
// Section: WD203
// Date of Last Update: January 16, 2026

include 'classes/Customer.php';
include 'classes/Account.php';

$accounts = [
    new Account(123, 'Savings', 50.00),
    new Account(456, 'Checking', 3500.00),
    new Account(789, 'Credit', -100.00),
    new Account(203, 'Investment',  0.00),
];

$customer = new Customer('Prince', 'Laxamana', 'pslaxamana@gmail.com', 'i<3cats', $accounts);

function addTransaction($accounts, $account_index, $amount, $date, $isDeposit = true)
{
    $isDeposit ? $accounts[$account_index]->deposit($amount) : $accounts[$account_index]->withdraw($amount);

    echo '<tr>';
    echo '<td>' . $date . '</td>';
    foreach ($accounts as $account) {
        echo
            '<td ' . ($account->getBalance() > 0 ? 'class="credit"' : 'class="overdrawn"') . '>' .
            'PHP ' . number_format($account->getBalance(), 2, ) .
            '</td>';
    }
    echo '</tr>';
}
?>

<?php include 'includes/header.php' ?>

<h1><?= $customer->getFullName() ?></h1>

<table>
    <tr>
        <th>Date</th>
        <?php foreach ($accounts as $account)
            echo '<th>' . $account->type . '</th>'; ?>
    </tr>

    <?php

    addTransaction($accounts, 0, 0, 'December 20, 2025');    
    addTransaction($accounts, 0, 10000, 'December 25, 2025');
    $accounts[2]->deposit(600);
    $accounts[3]->deposit(1000);
    addTransaction($accounts, 0, 1600, 'December 26, 2025',false);

    $accounts[2]->withdraw(500);
    $accounts[3]->deposit(1750);
    addTransaction($accounts, 1, 1500, 'January 5, 2025',true);

    $accounts[3]->deposit(1750);
    addTransaction($accounts, 0, 8450, 'January 15, 2025',false);

    ?>
</table>

</section>

<?php include 'includes/footer.php' ?>