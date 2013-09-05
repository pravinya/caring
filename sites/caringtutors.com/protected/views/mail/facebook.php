<?php
/**
 * available variables inside the $data array:
 * '{email}'=> user email address,
 * '{username}'=> username,
 * '{activation_code}'=> activation code if available,
 * '{link}'=> short link without get parameters,
 * '{full_link}'=> full link with get parameters,
 * '{website}'=> value of the appName parameter inside your configuration file
 * '{temporary_username}' => boolean: true if the username is temporary and can be changed
 *
 * usage example:
 * $data['{link}']
 */
?>
Hi <?php echo $data['{username}']; ?>!<br/>
Your account with <?php echo $data['{website}']; ?>.com is now active. <br/>
You can now login to <?php echo $data['{website}']; ?>.com and update your profile details anytime you wish.

<br/>
Following are your login credentials:
username: <?php echo $data['{username}']; ?>
password: <?php echo $data['{password}']; ?>
<br/>
Regards,<br/>
<?php echo $data['{website}']; ?>.com Team
