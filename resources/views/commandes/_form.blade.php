
<div class="card" style="max-width: 1050px;">
    <form action="{{ $action }}" method="POST">
        @csrf

        @if ($method === 'PUT')
            @method('PUT')
        @endif

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 16px; margin-bottom: 22px;">

            <div>
                <label for="code_client">Client *</label>
                <select id="code_client" name="code_client" required
                    style="width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 10px;">
                    <option value="">Choisir un client</option>

                    @foreach ($clients as $client)
                        <option value="{{ $client->code_client }}"
                            @selected(old('code_client', $commande->code_client ?? '') === $client->code_client)>
                            {{ $client->nom_client }}
                            ({{ $client->code_client }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="date_commande">Date de commande *</label>
                <input type="date"
                    id="date_commande"
                    name="date_commande"
                    required
                    max="{{ now()->format('Y-m-d') }}"
                    value="{{ old('date_commande', isset($commande) ? \Illuminate\Support\Carbon::parse($commande->date_commande)->format('Y-m-d') : now()->format('Y-m-d')) }}"
                    style="width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 10px;">
            </div>

            <div>
                <label for="condition">Condition *</label>
                <select id="condition" name="condition" required
                    style="width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 10px;">

                    <option value="LIV"
                        @selected(old('condition', $commande->condition ?? 'LIV') === 'LIV')>
                        LIV
                    </option>

                    <option value="T30"
                        @selected(old('condition', $commande->condition ?? '') === 'T30')>
                        T30
                    </option>
                </select>
            </div>
        </div>

        <h3>Produits commandés</h3>

        @php
            $rows = old('produits');

            if ($rows === null && isset($commande)) {
                $rows = $commande->produits->map(
                    fn ($p) => [
                        'code_produit' => $p->code_produit,
                        'quantite' => $p->pivot->quantite,
                    ]
                )->all();
            }

            $rows = $rows ?: [
                ['code_produit' => '', 'quantite' => 1]
            ];
        @endphp

        <div id="commande-products">
            @foreach ($rows as $row)
                <div class="commande-product-row"
                    style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center; margin-bottom: 10px;">

                    <select
                        name="produits[{{ $loop->index }}][code_produit]"
                        required
                        aria-label="Produit"
                        style="flex: 3; min-width: 220px; padding: 10px; border: 1px solid var(--border); border-radius: 10px;">

                        <option value="">Choisir un produit</option>

                        @foreach ($produits as $produit)
                            <option
                                value="{{ $produit->code_produit }}"
                                @selected(($row['code_produit'] ?? '') === $produit->code_produit)>
                                {{ $produit->designation }}
                                —
                                {{ number_format($produit->prix_unitaire, 2, ',', ' ') }} DH
                            </option>
                        @endforeach
                    </select>

                    <input
                        type="number"
                        name="produits[{{ $loop->index }}][quantite]"
                        min="1"
                        step="1"
                        required
                        value="{{ $row['quantite'] ?? 1 }}"
                        aria-label="Quantité"
                        style="flex: 1; min-width: 100px; padding: 10px; border: 1px solid var(--border); border-radius: 10px;">

                    <button
                        type="button"
                        class="btn remove-product"
                        style="background: var(--border); color: var(--text);">
                        <i class="ti ti-trash"></i> Retirer
                    </button>
                </div>
            @endforeach
        </div>

        <button
            type="button"
            id="add-product"
            class="btn"
            style="background: var(--border); color: var(--text); margin-bottom: 24px;">
            <i class="ti ti-plus"></i> Ajouter un produit
        </button>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy"></i> Enregistrer
            </button>

            <a href="{{ route('commandes.index') }}"
               class="btn"
               style="background: var(--border); color: var(--text);">
                Annuler
            </a>
        </div>
    </form>
</div>

<script>
(() => {
    const container = document.getElementById('commande-products');
    const addButton = document.getElementById('add-product');

    const template = container
        .querySelector('.commande-product-row')
        .cloneNode(true);

    let nextIndex = Math.max(
        ...Array.from(
            container.querySelectorAll('.commande-product-row select[name]')
        ).map(select =>
            Number(select.name.match(/produits\[(\d+)\]/)?.[1] ?? 0)
        )
    ) + 1;

    addButton.addEventListener('click', () => {
        const row = template.cloneNode(true);

        row.querySelectorAll('[name]').forEach(input => {
            input.name = input.name.replace(
                /produits\[\d+\]/,
                `produits[${nextIndex}]`
            );

            input.value = input.tagName === 'SELECT' ? '' : '1';
        });

        nextIndex++;
        container.appendChild(row);
    });

    container.addEventListener('click', event => {
        if (!event.target.closest('.remove-product')) {
            return;
        }

        const rows = container.querySelectorAll('.commande-product-row');

        if (rows.length > 1) {
            event.target.closest('.commande-product-row').remove();
        }
    });
})();
</script>
