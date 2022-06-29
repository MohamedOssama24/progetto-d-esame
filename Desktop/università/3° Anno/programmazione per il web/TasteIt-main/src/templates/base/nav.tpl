<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <p class="mb-0 phone pl-md-2">
                    <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 3208976543</a>
                    <a href="#"><span class="fa fa-paper-plane mr-1"></span> tasteit@gmail.com</a>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="reg">{if $user==NULL}
                    <p class="mb-0"><a href="/signup" class="mr-2">Registrati</a> <a href="/login">Log In</a> </p><p class="mb-0"></p>{else}<p class="mb-0"><a href="/logout">Log Out</a></p><p class="mb-0"></p>{/if}
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

    <div class="container" style="justify-content: space-between">
        <a class="navbar-brand" href="/home">Taste<span>It</span></a>

        {if isset($cartId)}
            <div class="order-lg-last btn-group">
                <button id="cart-btn" href="#" class="btn-cart btn dropdown-toggle dropdown-toggle-split" style="color: #b7472a" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-shopping-bag"></span>
                    <div class="d-flex justify-content-center align-items-center"><small>{sizeof($cartProducts)}</small></div>
                </button>

                <div id="cart-dropdown" class="dropdown-menu dropdown-menu-right">

                    {foreach $cartProducts as $productWithQuantity}

                        <div class="dropdown-item d-flex align-items-start" href="#">
                            <div class="img" style="background-image: url({$productWithQuantity[0]->getImagePath()})"></div>
                            <div class="text pl-3">
                                <h4>{$productWithQuantity[0]->getName()}</h4>
                                <p class="mb-0"><a href="#" class="price">${$productWithQuantity[0]->getPrice()}</a><span class="quantity ml-3">Quantità: {$productWithQuantity[1]}</span></p>
                            </div>
                        </div>

                    {/foreach}

                    <a class="dropdown-item text-center btn-link d-block w-100" href="/carts/{$cartId}/products">
                        Vai al carrello
                        <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                </div>
            </div>
        {/if}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/aboutUs" class="nav-link">Su di noi</a></li>
                {if isset($favId)}
                    <li class="nav-item"><a href="/favourites/{$favId}" class="nav-link">Preferiti</a></li>
                {/if}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Categorie</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04" id="dropdown-menu">
                        {foreach $categories as $category}
                            <a class="dropdown-item" href="/categories/{$category->getId()}/products"> {$category->getName()} </a>
                        {/foreach}
                    </div>
                </li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contattaci</a></li>
                {if isset($cartId)}
                <li class="nav-item"><a href="/profile" class="nav-link">Profilo</a></li>
                {/if}
            </ul>
        </div>
    </div>
</nav>
