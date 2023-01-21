<!-- Leave Room -->
<div class="modal fade" id="leave_room2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Выход из комнаты</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h3>
                        <center>Вы уверены?</center>
                    </h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Отмена</button>
                <button type="submit" class="btn btn-warning" id="confirm_leave2"><span class="glyphicon glyphicon-check"></span> Выход</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Delete Room -->
<div class="modal fade" id="delete_room2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Удаление комнаты</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h3>
                        <center>Вы уверены?</center>
                    </h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Отмена</button>
                <button type="submit" class="btn btn-danger" id="confirm_delete2"><span class="glyphicon glyphicon-check"></span> Удалить</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Add Member -->
<div class="modal fade" id="add_member" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Добавить участника</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                    $id = $_SESSION['id'] ?>
                    <form method="POST" action="addnewmember.php?id=<?php echo $id; ?>">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Выбрать:</span>
                            <select style="width:350px;" class="form-control" name="user">
                                <?php
                                include('../conn.php');
                                $mem = array();
                                $um = mysqli_query($conn, "select * from `chat_member` where chatroomid='$id'");
                                while ($umrow = mysqli_fetch_array($um)) {
                                    $mem[] = $umrow['userid'];
                                }
                                // $users = implode($mem, "', '");

                                $u = mysqli_query($conn, "select * from `user` where userid not in ('" . $users . "')");
                                if (mysqli_num_rows($u) < 1) {
                                ?>
                                    <option value="">Пользователь недоступен</option>
                                    <?php
                                } else {
                                    while ($urow = mysqli_fetch_array($u)) {
                                    ?>
                                        <option value="<?php echo $urow['userid']; ?>"><?php echo $urow['uname']; ?></option>
                                <?php
                                    }
                                }

                                ?>
                            </select>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Отмена</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Добавить</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->