<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2020/2/10
 * Time: 14:11
 * Note: model.php
 */

namespace app\lib;


use ext\mysql;

class model extends mysql
{
    /**
     * model constructor.
     */
    public function __construct()
    {
        $this->set_prefix('live_')->use_pdo(base::new()->mysql->pdo);
    }

    /**
     * 是否存在，与where连用
     *
     * @return bool
     */
    public function exist(): bool
    {
        return !empty($this->select()->limit(1)->fetch_row());
    }

    /**
     * 读取一行，与where，limit连用
     *
     * @param int $fetch_style
     *
     * @return array
     */
    public function read(int $fetch_style = \PDO::FETCH_ASSOC): array
    {
        return $this->select()->fetch_row($fetch_style);
    }

    /**
     * 读取一个值，与where，limit连用
     *
     * @param int $fetch_style
     *
     * @return array
     */
    public function read_val(int $fetch_style = \PDO::FETCH_ASSOC)
    {
        return current($this->select()->fetch_row($fetch_style));
    }

    /**
     * 读取多行，与where，limit连用
     *
     * @param int $fetch_style
     *
     * @return array
     */
    public function read_all(int $fetch_style = \PDO::FETCH_ASSOC): array
    {
        return $this->select()->fetch_all($fetch_style);
    }

    /**
     * 保存，与value连用
     *
     * @return bool
     */
    public function save(): bool
    {
        return $this->insert()->execute();
    }

    /**
     * 不存在则写入，存在就读取指定主键，只适用于自增主键
     *
     * @param array  $where
     * @param array  $data
     * @param string $id_field
     *
     * @return int
     */
    public function save_nx(array $where, array $data, string $id_field): int
    {
        //获取主键
        $id_res = $this->select()->fields($id_field)->where($where)->limit(1)->fetch_row();

        if (empty($id_res)) {
            //不存在，写入
            return $this->insert()->value($data)->execute() ? $this->get_last_insert_id() : 0;
        } else {
            //存在，直接返回id
            return (int)current($id_res);
        }
    }

    /**
     * 替换式写入，存在则更新，不存在则插入
     *
     * @param array $data
     * @param array $field_value
     *
     * @return bool
     */
    public function save_rp(array $data, array $field_value = []): bool
    {
        if (empty($field_value)) {
            //插入
            return $this->insert()->value($data)->execute();
        } else {
            //更新
            return $this->update()->value($data)->where($field_value)->execute();
        }
    }
}