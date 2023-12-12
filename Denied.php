<td>
    <a href="deactivate.php?id=<?php echo $review['id'] . "&" . "review=reject"; ?>" class='btn red'>Denied</a>

    <a href="activate.php?id=<?php echo $review['id'] . "&" . "review=accept"; ?>" class='btn green'>Confirm</a>
</td>
<td>
    <div class="chgtext">PENDING</div>
</td>

</tr>

<?php

if (isset($_GET['review'], $_GET['id'])) {
    $stmt = mysqli_prepare($conn, "UPDATE request_room SET state = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sd", $_GET['reviews'], $_GET['id']);
    $stmt->execute();
    $stmt->close();
}


?>

</tbody>
</table>
</div>
</form>