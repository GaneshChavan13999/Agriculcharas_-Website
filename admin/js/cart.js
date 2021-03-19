function add_to_cart( pid, name, qnt, price, disc){

    let cart1=localStorage.getItem("cart1");
    if(cart1==null){
        let products=[];
        let product={proid:pid, pname:name, quantity:qnt, pprice:price, pdisc:disc};
        products.push(product);
        localStorage.setItem("cart1", JSON.stringify(products));
        console.log("Product added first time.");
    }
    else{
        let pcart1= JSON.parse(cart1);
        let oldp=pcart1.find((item) => item.proid == pid);
        if(oldp){
            oldp.quantity=oldp.quantity+ qnt;
            pcart1.map((item) =>{
                if(item.proid==oldp.proid){
                    item.quantity= oldp.quantity;
                }
            })
            localStorage.setItem("cart1", JSON.stringify(pcart1));
            console.log("Product quantity increased.");
        }
        else{
            let product={proid:pid, pname:name, quantity:qnt, pprice:price, pdisc:disc};
            pcart1.push(product);
            localStorage.setItem("cart1", JSON.stringify(pcart1));
            console.log("Product added.");
        }
    }
}

function updateCart(){
    let cartstr= localStorage.getItem("cart1");
    let cart1= JSON.parse(cartstr);
    let totalprice=0;
    let ids="";
    let names="";
    let qnts="";
    let amts="";
    if(cart1==null||cart1.length==0){
        $(".cart").html("<h3>Cart is Empty</h3><br><h4>Shop Now</h4>");
    }
    else{
        
        let table=`<table>
        <caption> CART</caption>
        <thead>
          <tr class="tf" >
            <th scope="col" >Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Discount</th>
            <th scope="col">Total</th>
            <th scope="col">Action </th>
          </tr>
        </thead><tbody>`;
        cart1.map((item)=>{
            table+=`
            <tr>
            <td data-label="Product" >${item.pname}</td>
            <td data-label="Price">₹${item.pprice}</td>
            <td data-label="Quantity">${item.quantity}</td>
            <td data-label="Discount">${item.pdisc}%</td>
            <td data-label="Total">₹${item.quantity* item.pprice*(100-item.pdisc)/100}</td>
            <td data-label="Action"><button onclick="deleteItem(${item.proid})" class="btn-danger btn">Remove</button></td>
          </tr>
            `;
            iprice=item.quantity* item.pprice*(100-item.pdisc)/100;
            ids+= item.proid + ",";
            names+= item.pname + ",";
            qnts+= item.quantity+ ",";
            amts+= iprice+ ",";
            totalprice+= (item.quantity* item.pprice*(100-item.pdisc)/100);
        })

        table=table+`
        <tr>
        <td colspan=5 class="end">Total Price= </td>
        <td data-label="Total price">₹${ totalprice}</td></tr>
        <tr>
        <td colspan=5 class="end">Shipping= </td>
        <td data-label="Shipping">₹50</td></tr>
        <tr>
        <td colspan=5 class="end">Total Price= </td>
        <td data-label="Total Amount">₹${totalprice+ 50}</td></tr>
        <tr><td colspan=6 style="border:none; " class="end">
        <form action="pay.php" method="post">
        <input type="hidden" name="products[ids]" value="${ids}" hidden/>
        <input type="hidden" name="products[names]" value="${names}" hidden/>
        <input type="hidden" name="products[qnts]" value="${qnts}" hidden/>
        <input type="hidden" name="products[amts]" value="${amts}" hidden/>
        <input type="hidden" name="products[total]" value="${totalprice + 50}" hidden/>
        <button type="submit"class="btn-success btn">CHECKOUT</button></form></td>
        </tr>
        </tbody></table>`;

        $(".cart").html(table);
    }
}
function deleteItem(a){
    let cartstr= localStorage.getItem("cart1");
    let cart1= JSON.parse(cartstr);
    let newcart= cart1.filter((item)=>item.proid!=a);
    localStorage.setItem("cart1",JSON.stringify(newcart));
    updateCart();
    $(".adverts").css("display","block");
}
function dis(ids, qnts, amts){
    console.log(ids);
    console.log(qnts);
    console.log(amts);
}




$(document).ready(function(){
    updateCart();
})