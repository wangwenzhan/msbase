<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Base extends CI_Migration {
    public function up()
    {
        //stafflog
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'staff_id'=>array('type' => 'bigint','constraint' => 20),
            'content'=>array('type' => 'varchar','constraint' => 128,'default'=>''),//操作的描述
            'status'=>array('type' => 'int','constraint' => 11,'default'=>1),//1成功；2失败
            'createdt'=>array('type' => 'datetime','null' => true),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_stafflog');
        //Branch Category
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'customer_id'=>array('type' => 'bigint','constraint' => 20, 'default'=>0),
            'name'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'leftcode'=>array('type' => 'int','constraint' => 11,'default'=>0),//左编码
            'rightcode'=>array('type' => 'int','constraint' => 11,'default'=>0),//右编码
            'layer'=>array('type' => 'int','constraint' => 11,'default'=>0),//层级：0...n;0为根目录，每个product建立时自动建立根节点
            'priority'=>array('type' => 'int','constraint' => 11,'default'=>1),//1优先顺序
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_branchcategory');
        //Branch
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'branchcategory_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_branch');
        //Signorg Category
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'customer_id'=>array('type' => 'bigint','constraint' => 20, 'default'=>0),
            'name'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'leftcode'=>array('type' => 'int','constraint' => 11,'default'=>0),//左编码
            'rightcode'=>array('type' => 'int','constraint' => 11,'default'=>0),//右编码
            'layer'=>array('type' => 'int','constraint' => 11,'default'=>0),//层级：0...n;0为根目录，每个product建立时自动建立根节点
            'priority'=>array('type' => 'int','constraint' => 11,'default'=>1),//1优先顺序
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_signorgcategory');
        //Signorg
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'signorgcategory_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'deliverer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//为0：不指定，由操作者指定
            'addressee'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'postcode'=>array('type' => 'varchar','constraint' => 16,'default'=>''),
            'address'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'email'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'tel'=>array('type' => 'varchar','constraint' => 22,'default'=>''),
            'mobile'=>array('type' => 'varchar','constraint' => 22,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_signorg');
        //branch-signorg关联表
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'branch_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'signorg_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_branch_signorg');
        //branch-policy-signorg特殊项关联表
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'branch_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'policy_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'signorg_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_branch_policy_signorg');
        //branch-opcenter关联表
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'branch_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_branch_opcenter');
        //branch-policy-opcenter特殊项关联表
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'branch_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'policy_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_branch_policy_opcenter');
        //policy-branch-product关联表
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'policy_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'branch_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'product_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_policy_branch_product');

        //materialsigninout物料进出场登记，只针对客户物料进行管理
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'createdt'=>array('type' => 'datetime','null' => true),
            'inout'=>array('type' => 'int','constraint' => 11,'default'=>0),//0出；1进
            'outtype'=>array('type' => 'int','constraint' => 11,'default'=>0),//0正常；1作废；2丢失
            'quantity'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//数量
            'description'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'snfrom'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'snto'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'conts1'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'conts2'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'conts3'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'status'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'flag1'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'flag2'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'flag3'=>array('type' => 'int','constraint' => 11,'default'=>0),//
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_materialsigninout');
        //Invoiceins号码单证实例
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'createdt'=>array('type' => 'datetime','null' => true),
            'authrizedt'=>array('type' => 'datetime','null' => true),
            'updatedt'=>array('type' => 'datetime','null' => true),
            'status'=>array('type' => 'int','constraint' => 11,'default'=>0),//0未用；1使用；2作废；3丢失
            'flag1'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'flag2'=>array('type' => 'int','constraint' => 11,'default'=>0),//
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_invoiceins');
        //materialauthorization物料授权登记
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'createdt'=>array('type' => 'datetime','null' => true),
            'authrizedt'=>array('type' => 'datetime','null' => true),
            'operatedt'=>array('type' => 'datetime','null' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'quantity'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//数量
            'description'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'snfrom'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'snto'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'staff_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'operstaff_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'resfile1name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'resfile2name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'resfile3name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'resfile4name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'resfile1'=>array('type' => 'blob','null' => true),
            'resfile2'=>array('type' => 'blob','null' => true),
            'resfile3'=>array('type' => 'blob','null' => true),
            'resfile4'=>array('type' => 'blob','null' => true),
            'status'=>array('type' => 'int','constraint' => 11,'default'=>0),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_materialauthorization');
        //maoutputdetail物料授权输出明细
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'materialauthorization_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'outputdt'=>array('type' => 'datetime','null' => true),
            'quantity'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//数量
            'snfrom'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'snto'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'operstaff_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'outputflag'=>array('type' => 'int','constraint' => 11,'default'=>0),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_maoutputdetail');

        //Waybill提前输入的运单；一般用于到机构的包裹
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'signorg_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'deliverer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'delivercode'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'createdt'=>array('type' => 'datetime','null' => true),
            'status'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'printflag'=>array('type' => 'int','constraint' => 11,'default'=>0),//
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_waybill');
        //Pack到机构的包裹
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'signorg_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'waybill_id'=>array('type' => 'varchar','constraint' => 32,'default'=>0),
            'conti1'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'conti2'=>array('type' => 'int','constraint' => 11,'default'=>0),//

            'weight'=>array('type' => 'decimal','constraint' => '20,4','default'=>0),//
            'amount'=>array('type' => 'decimal','constraint' => '20,4','default'=>0),//
            'packdt'=>array('type' => 'datetime','null' => true),
            'deliverdt'=>array('type' => 'datetime','null' => true),
            'signdt'=>array('type' => 'datetime','null' => true),
            'packinglist'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'packinglistdt'=>array('type' => 'datetime','null' => true),
            'status'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'resultflag'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'sheet'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'page'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'flag1'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'flag2'=>array('type' => 'int','constraint' => 11,'default'=>0),//

            'signuser_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_pack');

        //Prejectins退函实例--根据退函扫描二维码而定
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'prejecttype_id'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'barcode'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'createdt'=>array('type' => 'datetime','null' => true),
            'handledt'=>array('type' => 'datetime','null' => true),
            'status'=>array('type' => 'int','constraint' => 11,'default'=>0),//
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_prejectins');

        //Returnins退函返还实例--需实物快递给客户指定地点
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'prejecttype_id'=>array('type' => 'int','constraint' => 11,'default'=>0),//
            'signorg_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'pack_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'pdocins_id'=>array('type' => 'varchar','constraint' => 32,'default'=>''),//具体产品实例 
            'createdt'=>array('type' => 'datetime','null' => true),
            'deliverdt'=>array('type' => 'datetime','null' => true),
            'signdt'=>array('type' => 'datetime','null' => true),
            'status'=>array('type' => 'int','constraint' => 11,'default'=>0),//
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bas_returnins');
        
    }

    
    public function down()
    {
        $this->dbforge->drop_table('bas_returnins');
        $this->dbforge->drop_table('bas_prejectins');
        $this->dbforge->drop_table('bas_pack');
        $this->dbforge->drop_table('bas_waybill');

        $this->dbforge->drop_table('bas_maoutputdetail');
        $this->dbforge->drop_table('bas_materialauthorization');
        $this->dbforge->drop_table('bas_invoiceins');
        $this->dbforge->drop_table('bas_materialsigninout');

        $this->dbforge->drop_table('bas_policy_branch_product');
        $this->dbforge->drop_table('bas_branch_policy_opcenter');
        $this->dbforge->drop_table('bas_branch_opcenter');
        $this->dbforge->drop_table('bas_branch_policy_signorg');
        $this->dbforge->drop_table('bas_branch_signorg');

        $this->dbforge->drop_table('bas_signorg');
        $this->dbforge->drop_table('bas_signorgcategory');
        $this->dbforge->drop_table('bas_branch');
        $this->dbforge->drop_table('bas_branchcategory');
        $this->dbforge->drop_table('bas_stafflog');
    }
    
}