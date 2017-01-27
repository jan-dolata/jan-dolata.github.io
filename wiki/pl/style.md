Style
===

## scss

Domyślny styl w formacie .scss `src/resources/assets/sass/grid.scss`.

Aby zmienić styl, przygotuj plik css zgodny ze strukturą klas:
- crude-container
    + crude-box
        + crude-header
            + crude-header-title
            + crude-header-description
            + crude-module
            + crude-alert-container
                + crude-alert
        + crude-list
            + crude-table
                + crude-table-head
                    + crude-table-head-row
                        + crude-table-head-cell (&& crude-table-head-cell-action)
                + crude-table-body
                    + crude-table-body-row (&& active)
                        + crude-table-body-cell (&& crude-table-body-cell-action)
                + crude-table-foot
                    + crude-table-foot-row
                        + crude-table-foot-cell
    + crude-modal
        + modal-content
            + modal-header
            + modal-body
                + content
                + crude-alert-container
                    + crude-alert
                + crude-modal
            + modal-footer
    + crude-action-btn

## Szablony (Templates)

!!! Uwaga: umieść nowe szablony przed wywołaniem `@include('CrudeCRUD::start')`.

Aby zmienić zawartość dowolnego przycisku, wystarczy nadpisać odpowiedni szablon z `src/resources/views/action-button.blade.php`.
