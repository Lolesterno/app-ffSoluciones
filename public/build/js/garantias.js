!function(){!async function(){try{const t="/api/garantia?url="+a(),n=await fetch(t),o=await n.json();e=o.garantia,function(){if(0===e.length){const e=document.querySelector("#listado-garantias"),a=document.createElement("LI");return a.textContent="No hay garantias para esta empresa",a.classList.add("no-tareas"),void e.appendChild(a)}const a={0:"Pendiente",1:"Aceptada",2:"Rechazada"};e.forEach(e=>{const t=document.createElement("LI");t.dataset.garantiaId=e.id,t.classList.add("garantiaDIV");const n=document.createElement("P");n.classList.add("seriales"),n.textContent=e.serialMedidor;const o=document.createElement("P");o.textContent=`Ingreso:  ${e.fecha} Hora: ${e.horaIngreso}`;const r=document.createElement("P");r.textContent=` Remision: ${e.tipoFactura.toUpperCase()} ${e.numeroFactura} `;const i=document.createElement("DIV");i.classList.add("opciones");const d=document.createElement("BUTTON");d.classList.add("estado-garantia"),d.classList.add(""+a[e.estado].toLowerCase()),d.dataset.estadoGarantia=e.estado,d.dataset.idGarantia=e.id,d.textContent="Generar PDF";const c=document.createElement("BUTTON");c.classList.add("aprobado"),c.dataset.idGarantia=e.id,c.textContent="Aceptar";const l=document.createElement("BUTTON");l.classList.add("rechazo"),l.dataset.idGarantia=e.id,l.textContent="Rechazar",i.appendChild(d),i.appendChild(c),i.appendChild(l),t.appendChild(n),t.appendChild(o),t.appendChild(r),t.appendChild(i),document.querySelector("#listado-garantia").appendChild(t),console.log(t)})}()}catch(e){console.log(e)}}();let e=[];function a(){const e=new URLSearchParams(window.location.search);return Object.fromEntries(e.entries()).url}function t(e,a,t){const n=document.querySelector(".alerta");n&&n.remove();const o=document.createElement("DIV");o.classList.add("alerta",a),o.textContent=e,t.parentElement.insertBefore(o,t.nextElementSibling),setTimeout(()=>{o.remove()},5e3)}document.querySelector("#agregar-garantia").addEventListener("click",(function(){const e=document.createElement("DIV");e.classList.add("modal"),e.innerHTML='\n            <form class="formulario" enctype="multipart/form-data">\n                <legend>Añade una nueva Garantia</legend>\n                <div class="campo">\n                    <label for="medidorId">Tipo de Medidor</label>\n                    <select name="medidorId" id="medidorId">\n                        <option value="1">CAM3050R200PRCAL</option>\n                        <option value="2">cam3075r160eqcal</option>\n                        <option value="3">cam3100r160eqcal</option>\n                    </select>\n                </div>\n                <div class="campo">\n                    <label for="serialMedidor">Serial del Medidor</label>\n                    <input type="text" name="serialMedidor" id="serialMedidor" placeholder="Serial del Medidor">\n                </div>\n                <div class="campo">\n                    <label for="tipoFactura">Tipo de Medidor</label>\n                    <select name="tipoFactura" id="tipoFactura">\n                        <option value="fs">FSFE</option>\n                        <option value="vc">VCFE</option>\n                        <option value="pos">POS</option>\n                    </select>\n                </div>\n                <div class="campo">\n                    <label for="numeroFactura">Número del la Factura</label>\n                    <input type="text" name="numeroFactura" id="numeroFactura" placeholder="Número de la factura">\n                </div>\n                <div class="campo">\n                    <label for="archivoGarantia">Soporte Fisico</label>\n                    <input type="file" name="archivoGarantia" id="archivoGarantia" accept=".pdf/*, image/*"> \n                </div>\n                <div class="opciones">\n                    <input type="submit" value="Crear Garantia" class="submit-nueva-garantia">\n                    <button type="button" class="cerrar-modal">Cancelar</button>\n                </div>\n            </form>\n        ',setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},0),e.addEventListener("click",(function(n){if(n.preventDefault(),n.target.classList.contains("cerrar-modal")){document.querySelector(".formulario").classList.add("cerrar"),setTimeout(()=>{e.remove()},500)}n.target.classList.contains("submit-nueva-garantia")&&function(){const e=document.querySelector("#serialMedidor").value.trim(),n=document.querySelector("#numeroFactura").value.trim(),o=document.querySelector("#tipoFactura").value,r=document.querySelector("#medidorId").value;if(e&&""!==n)return void async function(e,n,o,r){const i=new FormData;i.append("medidorId",r),i.append("serialMedidor",e),i.append("tipoFactura",o),i.append("numeroFactura",n),i.append("garantiaId",a());try{const e="http://mysterious-bayou-89699/api/garantia",a=await fetch(e,{method:"POST",body:i}),n=await a.json();if(t(n.mensaje,n.tipo,document.querySelector(".formulario legend")),"exito"===n.tipo){const e=document.querySelector(".modal");setTimeout(()=>{e.remove()},1500)}}catch(e){console.log(e)}}(e,n,o,r);t("Faltan datos ","error",document.querySelector(".formulario legend"))}()})),document.querySelector(".todo").appendChild(e)}))}();