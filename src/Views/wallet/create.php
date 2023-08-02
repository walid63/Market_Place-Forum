<div class="walletFormBlock">
    <div class="container">
        <h1 class="text-center">Crée un nouveau portefeuille</h1>
        <div class="walletCreatorMain">
            <form class="walletCreateForm"  method="post">
                 
              <br>  <select class="form-select" name="type" aria-label="Default select example">
                    <option selected>Choisir le type du wallet:</option>
                    <option value="Bitcoin">Bitcoin</option>
                    <option value="Paycef">Paycef</option>
                    <option value="PCS">PCS</option>
                    <option value="Paypal">Paypal</option>
                </select>

                <br>  <br><label class="text-light" for="">Choisir un nom</label>
                <br><input type="text" name ="walletName">
                <br><span class="text-light">Ex: Compte par defaut</span>&nbsp;
                 &nbsp;
                <br><label class="text-light" for="">Choisir un montant</label>
                <br><input type="text" name="montant">
                &nbsp;
                <br><span class="text-light">Il seras mis a jour lorce que vous ravitaillerais votre compte</span>&nbsp;
                <br> <button name="submit" type="submit">Valider</button>
          
                
            </form>
        </div>
    </div>
</div>