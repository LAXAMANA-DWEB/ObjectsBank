<?php
// Author: Laxamana, Prince S.
// Section: WD203
// Date of Last Update: January 17, 2026

include 'classes/Customer.php';
include 'classes/Account.php';

$accounts = [
    new Account(1180611, 'Savings', 50.00),
    new Account(1181106, 'Checking', 3500.00),
    new Account(1110801, 'Credit', -100.00),
    new Account(1110801, 'Investment', 0.00),
];

$customer = new Customer('Prince', 'Laxamana', 'pslaxamana@gmail.com', 'i<3cats', $accounts);

function addTransaction($accounts, $account_index, $amount, $isDeposit = true)
{
    $account = $accounts[$account_index];
    $isDeposit ? $account->deposit($amount) : $account->withdraw($amount);
}

function displayBalance($accounts)
{
    foreach ($accounts as $account) {
        echo '<tr>';
        echo '<td>' . $account->number . '</td>';
        echo '<td>' . $account->type . '</td>';
        echo '<td ' .
            ($account->getBalance() > 5000
                ? 'class="credit"'
                : ($account->getBalance() > 0
                    ? ''
                    : 'class="overdrawn"'
                )
            ) . '>' .
            'PHP ' . number_format($account->getBalance(), 2) .
            '</td>';
        echo '</tr>';
    }
}
?>

<?php include 'includes/header.php' ?>

<h2>NAME: <?= $customer->getFullName() ?></h2>
<h3>Email: <?= $customer->email ?></h3>

<table>
    <tr>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Balance</th>
    </tr>

    <?= displayBalance($accounts) ?>

    <?php
    addTransaction($accounts, 0, 10000);

    displayBalance($accounts);
    ?>

    <?php
    addTransaction($accounts, 0, 5000, false);
    addTransaction($accounts, 1, 1900);
    addTransaction($accounts, 2, 600);
    addTransaction($accounts, 3, 2500);

    displayBalance($accounts);
    ?>
</table>

</section>

<?php include 'includes/footer.php' ?>