<div class="container">
    <h3>Order Details </h3>
    <h5>Name : <?php echo e($mailData['name']); ?></h5>
    <h5>email : <?php echo e($mailData['email']); ?></h5>
    <h5>mobile : <?php echo e($mailData['mobile']); ?></h5>
    
    <table class="table border1">
        <tr class="border1">
            <td class="border1">Product Name</td>
            <td class="border1"><?php echo e($mailData['product_name']); ?></td>
        </tr>
        <tr class="border1">
            <td class="border1">Product Code</td>
            <td class="border1"><?php echo e($mailData['product_code']); ?></td>
        </tr>
        <tr class="border1">
            <td class="border1">Quantity</td>
            <td class="border1"><?php echo e($mailData['quantity']); ?></td>
        </tr>
        <tr class="border1">
            <td class="border1">Notes</td>
            <td class="border1"><?php echo e($mailData['notes']); ?></td>
        </tr>
    </table>
</div>
<style>
    .border1{
        border: 1px solid black;
    }
    *{
        font-size: 16px;
    }
</style><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/site/pages/email/emailProduct.blade.php ENDPATH**/ ?>