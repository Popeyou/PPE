<?php

$requete = "

drop trigger if exists verifage;
delimiter //
create trigger verifage
before insert on client
for each row
begin
if datediff(curdate(),new.DATENAISSC)/365 < 18
	  then
	         signal sqlstate'42000'
	         set message_text = 'Impossible';
	  end if;
end //
delimiter ;

";

?>