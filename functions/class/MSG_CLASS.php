<?php
    class CHAT
    {
        public function __construct(){
            if( isset($_GET['readmsg'])){
                $del_msg_id = $_GET['readmsg'];
                include("functions/DB/DB.php");
                $s_query = "DELETE FROM unread_msg WHERE msg_database_id = $del_msg_id";
                $conn->query($s_query);
            };
        }
        public function GetMessageAuthorName($id){
            include("functions/DB/DB.php");
            $s_query = "SELECT * FROM students_table, teachers_table WHERE student_id = $id OR teacher_id = $id";
            $do_query = mysqli_fetch_assoc($conn->query($s_query));
            return $do_query['teacher_name'] . ' ' . $do_query['teacher_lastname'];

        }
        
        public function UnreadMsg($id){
            include("functions/DB/DB.php");
            $s_query = "SELECT * FROM unread_msg WHERE msg_receiver_id = $id";
            $do_query = $conn->query($s_query);
            return $do_query->num_rows;
        }
        public function GetLastMessages($id){
            include("functions/DB/DB.php");
            $s_query = "SELECT * FROM messages WHERE msg_receiver_id = $id";
            $do_query = $conn->query($s_query);
            while($msg = $do_query->fetch_assoc()) {
                $msg_time = '40წთ';
                $msg_sender_avatar_link = ''
                ?>
                    <a class="dropdown-item d-flex align-items-center" href="do.php?section=messages&readmsg=<?php echo $msg["msg_id"]; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="<?php echo $msg["msg_author_picurl"]; ?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo $msg["msg_content"]; ?></div>
                    <div class="small text-gray-500"><?php echo $this->GetMessageAuthorName($msg["msg_author_id"]) . ' ' . $msg_time; ?></div>
                  </div>
                </a>
                <?php
            }
        }
    }
?>