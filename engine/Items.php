<?php

class Items
{
    public static function getFormItems($form)
    {
        $stmt = DB::getInstance()->prepare('SELECT `id`, `name`, `created_at` FROM `wp_frm_items` WHERE `form_id` = ? ORDER BY `created_at` DESC');
        $stmt->execute(array($form));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getItem($item)
    {
        $stmt = DB::getInstance()->prepare('SELECT `wp_frm_item_metas`.`id` AS "id", `wp_frm_item_metas`.`meta_value` AS "value", `wp_frm_fields`.`name` AS "name", `wp_frm_fields`.`description` AS "description" FROM `wp_frm_item_metas` LEFT JOIN `wp_frm_fields` ON `wp_frm_fields`.`id` = `wp_frm_item_metas`.`field_id` WHERE `item_id` = ? ORDER BY `wp_frm_fields`.`field_order` ASC');
        $stmt->execute(array($item));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}