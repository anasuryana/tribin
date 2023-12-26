<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Receive</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-primary" id="btnNew" onclick="btnNewOnclick(this)" title="New"><i class="fas fa-file"></i></button>
            <button type="button" class="btn btn-outline-primary" id="btnSave" onclick="btnSaveOnclick(this)" title="Save"><i class="fas fa-save"></i></button>
            <button type="button" class="btn btn-primary" id="btnSubmit" onclick="btnSubmitOnclick(this)" title="Affect stock status">Submit</button>
        </div>
    </div>
</div>
<form id="order-form">
    <div class="container">
        <div class="row">
            <div class="col mb-1" id="div-alert">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-1">
                <label for="orderCode" class="form-label">Code</label>
                <div class="input-group mb-1">
                    <input type="text" id="orderCode" class="form-control" placeholder="Autogenerate" maxlength="17" disabled>
                    <button class="btn btn-primary" type="button" onclick="btnShowReceiveModal()"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-6 mb-1">
                <label for="orderIssueDate" class="form-label">Receive Date</label>
                <input type="text" id="orderIssueDate" class="form-control" maxlength="10" readonly>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 mb-1">
                <label for="orderSupplier" class="form-label">Supplier Name</label>
                <div class="input-group input-group-sm mb-1">
                    <input type="text" id="orderSupplier" class="form-control" maxlength="50" disabled>
                    <input type="hidden" id="orderSupplierCode">
                </div>
            </div>
            <div class="col-md-6 mb-1">
                <label for="receiveSupplierDN" class="form-label">Supplier DN</label>
                <input type="text" id="receiveSupplierDN" class="form-control form-control-sm" maxlength="45">
            </div>
        </div>
        <div class="row border-top">
            <div class="col-md-12 mb-1">
                <div class="table-responsive" id="orderTableContainer">
                    <table id="orderTable" class="table table-sm table-hover table-bordered caption-top">
                        <caption>List of items</caption>
                        <thead class="table-light">
                            <tr>
                                <th class="d-none">idLine</th>
                                <th>PO Code</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="input-group input-group-sm mb-1">
                    <span class="input-group-text">Item Code</span>
                    <input type="text" id="orderItemCode" class="form-control orderInputItem" placeholder="Item Code" disabled>
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="input-group input-group-sm mb-1">
                    <span class="input-group-text">Item Name</span>
                    <input type="text" id="orderItemName" class="form-control orderInputItem" disabled>
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="input-group input-group-sm mb-1">
                    <span class="input-group-text">Qty</span>
                    <input type="text" id="orderQty" class="form-control orderInputItem" title="price per hour">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-1">
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-outline-secondary" id="btnUpdateLine" onclick="btnUpdateLineOnclick(this)">Update line</button>
                    <button type="button" class="btn btn-outline-secondary" id="btnRemoveLine" onclick="btnRemoveLineOnclick(this)">Remove line</button>
                </div>
            </div>
            <div class="col-md-6 mb-1 text-end">
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-primary" id="btnFromPO" onclick="btnFromPOLineOnclick(this)">Add from PO</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="orderInputMode" value="0">
</form>

<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Receive List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col mb-1">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Search by</span>
                                <select id="orderSearchBy" class="form-select" onchange="orderSearch.focus()">
                                    <option value="0">Order Code</option>
                                    <option value="1">Supplier</option>
                                    <option value="2">PO Number</option>
                                </select>
                                <input type="text" id="orderSearch" class="form-control" maxlength="50" onkeypress="orderSearchOnKeypress(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive" id="orderSavedTabelContainer">
                                <table id="orderSavedTabel" class="table table-sm table-striped table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Code</th>
                                            <th>Customer</th>
                                            <th>Issue Date</th>
                                            <th>Quotation</th>
                                            <th>PO Number</th>
                                            <th>Delivery Plan Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Outstanding PO-->
<div class="modal fade" id="purchaseOutStandingModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">PO Outstanding List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col mb-1">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Search by</span>
                                <select id="purchaseSearchSearchBy" class="form-select" onchange="purchaseSearch.focus()">
                                    <option value="0">Purchase Code</option>
                                    <option value="1">Supplier</option>
                                </select>
                                <input type="text" id="purchaseSearch" class="form-control" maxlength="50" onkeypress="purchaseSearchOnKeypress(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive" id="purchaseOutStandingTabelContainer">
                                <table id="purchaseOutStandingTabel" class="table table-sm table-striped table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Code</th>
                                            <th>Supplier</th>
                                            <th>Issue Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function btnFromPOLineOnclick() {
        const myModal = new bootstrap.Modal(document.getElementById('purchaseOutStandingModal'), {})
        myModal.show()
    }

    purchaseOutStandingModal.addEventListener('shown.bs.modal', () => {
        purchaseSearch.focus()
    })

    function purchaseSearchOnKeypress(e) {
        if (e.key === 'Enter') {
            e.target.disabled = true
            const data = {
                searchBy: purchaseSearchSearchBy.value,
                searchValue: e.target.value,
            }
            $.ajax({
                type: "GET",
                url: "receive/outstanding-po",
                data: data,
                dataType: "json",
                success: function(response) {
                    e.target.disabled = false
                    let myContainer = document.getElementById("purchaseOutStandingTabelContainer");
                    let myfrag = document.createDocumentFragment();
                    let cln = purchaseOutStandingTabel.cloneNode(true);
                    myfrag.appendChild(cln);
                    let myTable = myfrag.getElementById("purchaseOutStandingTabel");
                    let myTableBody = myTable.getElementsByTagName("tbody")[0];
                    myTableBody.innerHTML = ''
                    response.data.forEach((arrayItem) => {
                        newrow = myTableBody.insertRow(-1)
                        newcell = newrow.insertCell(0)
                        newcell.innerHTML = arrayItem['TPCHORDDETA_PCHCD']
                        newcell.style.cssText = 'cursor:pointer'
                        newcell.onclick = () => {
                            $("#purchaseOutStandingModal").modal('hide')
                            orderSupplier.value = arrayItem['MSUP_SUPNM']
                            orderSupplierCode.value = arrayItem['MSUP_SUPCD']
                            loadDocumentDetail({
                                doc: arrayItem['TPCHORDDETA_PCHCD']
                            })
                        }
                        newcell = newrow.insertCell(-1)
                        newcell.innerHTML = arrayItem['MSUP_SUPNM']
                        newcell = newrow.insertCell(-1)
                        newcell.innerHTML = arrayItem['TPCHORD_ISSUDT']
                    })
                    myContainer.innerHTML = ''
                    myContainer.appendChild(myfrag)
                },
                error: function(xhr, xopt, xthrow) {
                    alertify.warning(xthrow);
                    e.target.disabled = false
                }
            });
        }
    }

    function loadDocumentDetail(data) {
        $.ajax({
            type: "GET",
            url: `receive/outstanding-po/${btoa(data.doc)}`,
            dataType: "json",
            success: function(response) {
                let myContainer = document.getElementById("orderTableContainer");
                let myfrag = document.createDocumentFragment();
                let cln = orderTable.cloneNode(true);
                myfrag.appendChild(cln);
                let myTable = myfrag.getElementById("orderTable");
                let myTableBody = myTable.getElementsByTagName("tbody")[0];
                myTableBody.innerHTML = ''
                response.data.forEach((arrayItem) => {
                    newrow = myTableBody.insertRow(-1)
                    newrow.onclick = (event) => {
                        const selrow = orderTable.rows[event.target.parentElement.rowIndex]
                        if (selrow.title === 'selected') {
                            selrow.title = 'not selected'
                            selrow.classList.remove('table-info')
                            orderItemCode.value = ''
                            orderItemName.value = ''
                            orderQty.value = ''
                        } else {
                            const ttlrows = orderTable.rows.length
                            for (let i = 1; i < ttlrows; i++) {
                                orderTable.rows[i].classList.remove('table-info')
                                orderTable.rows[i].title = 'not selected'
                            }
                            selrow.title = 'selected'
                            selrow.classList.add('table-info')

                            orderItemCode.value = selrow.cells[2].innerText
                            orderItemName.value = selrow.cells[3].innerText
                            orderQty.value = selrow.cells[4].innerText
                        }
                    }
                    newcell = newrow.insertCell(0)
                    newcell.classList.add('d-none')
                    newcell.style.cssText = 'cursor:pointer'
                    newcell = newrow.insertCell(-1)
                    newcell.innerHTML = arrayItem['TPCHORDDETA_PCHCD']
                    newcell = newrow.insertCell(-1)
                    newcell.innerHTML = arrayItem['TPCHORDDETA_ITMCD']
                    newcell = newrow.insertCell(-1)
                    newcell.innerHTML = arrayItem['MITM_ITMNM']
                    newcell = newrow.insertCell(-1)
                    newcell.classList.add('text-end')
                    newcell.innerHTML = arrayItem['BALQT']
                    newcell = newrow.insertCell(-1)
                    newcell.classList.add('text-end')
                    newcell.innerHTML = arrayItem['TPCHORDDETA_ITMPRC_PER']
                })
                myContainer.innerHTML = ''
                myContainer.appendChild(myfrag)
            },
            error: function(xhr, xopt, xthrow) {
                alertify.warning(xthrow);
            }
        });
    }

    function btnRemoveLineOnclick(pthis) {
        const ttlrows = orderTable.rows.length
        let idItem = ''
        let iFounded = 0
        for (let i = 1; i < ttlrows; i++) {
            if (orderTable.rows[i].title === 'selected') {
                idItem = orderTable.rows[i].cells[0].innerText.trim()
                iFounded = i
                break
            }
        }

        if (iFounded > 0) {
            if (confirm(`Are you sure want to delete ?`)) {
                if (idItem.length >= 1) {
                    pthis.disabled = true
                    pthis.innerHTML = `Please wait`
                    $.ajax({
                        type: "DELETE",
                        url: `receive/items/${idItem}`,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(response) {
                            pthis.innerHTML = `Remove line`
                            pthis.disabled = false

                            orderTable.rows[iFounded].remove()
                            alertify.message(response.msg)
                            tribinClearTextBoxByClassName('orderInputItem')
                        },
                        error: function(xhr, xopt, xthrow) {
                            alertify.warning(xthrow);
                            pthis.disabled = false
                            pthis.innerHTML = `Remove line`
                        }
                    });
                } else {
                    orderTable.rows[iFounded].remove()
                    tribinClearTextBoxByClassName('orderInputItem')
                }
            }
        } else {
            alertify.message('nothing selected item')
        }
    }

    function btnUpdateLineOnclick(pthis) {
        const ttlrows = orderTable.rows.length
        let idItem = ''
        let iFounded = 0
        for (let i = 1; i < ttlrows; i++) {
            if (orderTable.rows[i].title === 'selected') {
                idItem = orderTable.rows[i].cells[0].innerText.trim()
                iFounded = i
                break
            }
        }

        if (iFounded > 0) {
            if (idItem.length >= 1) {
                if (orderCode.value.length === 0) {
                    alertify.warning(`receive code is required`)
                    return
                }
                if (confirm(`Are you sure want to update ?`)) {
                    pthis.disabled = true
                    pthis.innerHTML = `Please wait`
                    const data = {
                        _token: '{{ csrf_token() }}',
                        quantity: orderQty.value,
                    }
                    $.ajax({
                        type: "PUT",
                        url: `receive/items/${idItem}`,
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            pthis.innerHTML = `Update line`
                            pthis.disabled = false

                            if (response.msg === 'OK') {
                                refreshTableRent(iFounded)
                            }

                            alertify.message(response.msg)
                        },
                        error: function(xhr, xopt, xthrow) {
                            alertify.warning(xthrow);
                            pthis.disabled = false
                            pthis.innerHTML = `Update line`
                        }
                    });
                }
            } else {
                refreshTableRent(iFounded)
            }
        } else {
            alertify.message('nothing selected item')
        }
    }

    function refreshTableRent(selectedRow) {
        orderTable.rows[selectedRow].cells[4].innerText = orderQty.value
    }
</script>