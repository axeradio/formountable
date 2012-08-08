<?php

class Items
{
    public static function getFormItems($form)
    {
        $stmt = DB::getInstance()->prepare('SELECT `id`, `name`, `created_at` FROM `' . WP_PREFIX . 'frm_items` WHERE `form_id` = ? ORDER BY `created_at` DESC');
        $stmt->execute(array($form));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getItem($item)
    {
        $stmt = DB::getInstance()->prepare('SELECT `' . WP_PREFIX . 'frm_item_metas`.`id` AS "id", `' . WP_PREFIX . 'frm_item_metas`.`meta_value` AS "value", `' . WP_PREFIX . 'frm_fields`.`name` AS "name", `' . WP_PREFIX . 'frm_fields`.`description` AS "description" FROM `' . WP_PREFIX . 'frm_item_metas` LEFT JOIN `' . WP_PREFIX . 'frm_fields` ON `' . WP_PREFIX . 'frm_fields`.`id` = `' . WP_PREFIX . 'frm_item_metas`.`field_id` WHERE `item_id` = ? ORDER BY `' . WP_PREFIX . 'frm_fields`.`field_order` ASC');
        $stmt->execute(array($item));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}