# 数据库设计

## 基金净值表

> 表名func_value_xxxxxx中最后6位表示基金代号。

```
CREATE TABLE `fund_value_160505` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL COMMENT '日期',
  `current_value` float(10.4) NOT NULL DEFAULT '0' COMMENT '当前净值, 单位：元',
  `total_value` float(10.4) NOT NULL DEFAULT '0' COMMENT '累计净值, 单位：元',
  `bonus_value` float(10.4) NOT NULL DEFAULT '0' COMMENT '分红净值, 单位：元',
  `is_del` tinyint(2) NOT NULL DEFAULT '0' ,
  `create_time` datetime COMMENT '创建时间',
  `update_time` datetime COMMENT '刷新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;
```

