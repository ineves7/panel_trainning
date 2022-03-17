@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Modals')

@section('content')
<!-- Basic Modals start -->
<section id="basic-modals">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Modal</h4>
        </div>
        <div class="card-body">
          <div class="demo-inline-spacing">
            <!-- Basic trigger modal -->
            <div class="basic-modal">
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#default">
                Basic Modal
              </button>

              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="default"
                tabindex="-1"
                aria-labelledby="myModalLabel1"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5>Check First Paragraph</h5>
                      <p>
                        Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie
                        carrot cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                        chocolate cake liquorice.
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Basic trigger modal end -->

            <!-- Vertical modal -->
            <div class="vertical-modal-ex">
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#exampleModalCenter"
              >
                Vertically Centered
              </button>
              <!-- Modal -->
              <div
                class="modal fade"
                id="exampleModalCenter"
                tabindex="-1"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                        Croissant jelly-o halvah chocolate sesame snaps. Brownie caramels candy canes chocolate cake
                        marshmallow icing lollipop I love. Gummies macaroon donut caramels biscuit topping danish.
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Vertical modal end-->

            <!-- Disabled Backdrop -->
            <div class="disabled-backdrop-ex">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#backdrop">
                Disabled Backdrop
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="backdrop"
                tabindex="-1"
                aria-labelledby="myModalLabel4"
                data-bs-backdrop="false"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel4">Disabled Backdrop</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                        Candy oat cake topping topping chocolate cake. Icing pudding jelly beans I love chocolate carrot
                        cake wafer candy canes. Biscuit croissant fruitcake bonbon soufflé.
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Disabled Backdrop end-->

            <!-- Disabled Animation -->
            <div class="disabled-animation-ex">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#animation">
                Disabled Animation
              </button>
              <!-- Modal -->
              <div
                class="modal text-start"
                id="animation"
                tabindex="-1"
                aria-labelledby="myModalLabel6"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel6">Disabled Animation</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                        Chocolate bar jelly dragée cupcake chocolate bar I love donut liquorice. Powder I love marzipan
                        donut candy canes jelly-o. Dragée liquorice apple pie candy biscuit danish lemon drops sugar
                        plum.
                      </p>
                      <div class="alert alert-success" role="alert">
                        <div class="alert-body">
                          <span class="fw-bolder">Well done!</span> You successfully read this important alert message.
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Disabled Animation end-->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Modals end -->

<!-- Modal Themes start -->
<section id="modal-themes">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Modal Themes</h4>
        </div>
        <div class="card-body">
          <p class="card-text mb-0">
            Use class <code>.modal-{color}</code> with your <code>.modal</code> to change theme of modal
          </p>
          <div class="demo-inline-spacing">
            <div class="d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary">
                Primary
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start modal-primary"
                id="primary"
                tabindex="-1"
                aria-labelledby="myModalLabel160"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel160">Primary Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                      carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                      bears cupcake dessert.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-inline-block">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-outline-secondary"
                data-bs-toggle="modal"
                data-bs-target="#secondary"
              >
                Secondary
              </button>
              <!-- Modal -->
              <div
                class="modal fade modal-secondary text-start"
                id="secondary"
                tabindex="-1"
                aria-labelledby="myModalLabel1660"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1660">Secondary Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                      carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                      bears cupcake dessert.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#success">
                Success
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start modal-success"
                id="success"
                tabindex="-1"
                aria-labelledby="myModalLabel110"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel110">Success Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                      carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                      bears cupcake dessert.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#danger">
                Danger
              </button>
              <!-- Modal -->
              <div
                class="modal fade modal-danger text-start"
                id="danger"
                tabindex="-1"
                aria-labelledby="myModalLabel120"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel120">Danger Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                      carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                      bears cupcake dessert.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#warning">
                Warning
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start modal-warning"
                id="warning"
                tabindex="-1"
                aria-labelledby="myModalLabel140"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel140">Warning Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                      carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                      bears cupcake dessert.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#info">
                Info
              </button>
              <!-- Modal -->
              <div
                class="modal fade modal-info text-start"
                id="info"
                tabindex="-1"
                aria-labelledby="myModalLabel130"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel130">Info Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                      carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                      bears cupcake dessert.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#dark">
                Dark
              </button>
              <!-- Modal -->
              <div
                class="modal fade modal-dark text-start"
                id="dark"
                tabindex="-1"
                aria-labelledby="myModalLabel150"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel150">Dark Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                      carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                      bears cupcake dessert.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal Themes end -->

<!-- Modal Sizes start -->
<section id="modal-sizes">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Modal Sizes</h4>
        </div>
        <div class="card-body">
          <p class="card-text mb-0">
            Add class <code>.modal-{xs|sm|lg|xl}</code> with <code>.modal-dialog</code> to create a modal with size
          </p>

          <div class="demo-inline-spacing">
            <div class="modal-size-xs d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#xSmall">
                Extra Small
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="xSmall"
                tabindex="-1"
                aria-labelledby="myModalLabel20"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered modal-xs">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel20">Extra Small Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Halvah powder wafer. Chupa chups pie topping carrot cake cake. Tootsie roll sesame snaps jelly-o
                      marshmallow marshmallow jelly jujubes candy. Chupa chups cheesecake gingerbread chupa chups cake
                      candy canes sweet roll.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-size-sm d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#small">
                Small Modal
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="small"
                tabindex="-1"
                aria-labelledby="myModalLabel19"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel19">Small Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Biscuit chocolate cake gummies. Lollipop I love macaroon bear claw caramels. I love marshmallow
                      tiramisu I love fruitcake I love gummi bears. Carrot cake topping liquorice. Pudding caramels
                      liquorice sweet I love. Donut powder cupcake ice cream tootsie roll jelly.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-size-default d-inline-block">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#defaultSize"
              >
                Default Modal
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="defaultSize"
                tabindex="-1"
                aria-labelledby="myModalLabel18"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel18">Default Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      I love candy candy cake powder I love icing ice cream pastry. Biscuit lemon drops sesame snaps.
                      Topping biscuit croissant gummi bears jelly beans cake cake bear claw muffin. Lemon drops oat cake
                      pastry bear claw liquorice lemon drops.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-size-lg d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#large">
                Large Modal
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel17">Large Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      I love tart cookie cupcake. I love chupa chups biscuit. I love marshmallow apple pie wafer
                      liquorice. Marshmallow cotton candy chocolate. Apple pie muffin tart. Marshmallow halvah pie
                      marzipan lemon drops jujubes. Macaroon sugar plum cake icing toffee.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-size-xl d-inline-block">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#xlarge">
                Extra Large Modal
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="xlarge"
                tabindex="-1"
                aria-labelledby="myModalLabel16"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel16">Extra Large Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Cake cupcake sugar plum. Sesame snaps pudding cupcake candy canes icing cheesecake. Sweet roll
                      pudding lollipop apple pie gummies dragée. Chocolate bar cookie caramels I love lollipop ice cream
                      tiramisu lollipop sweet.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="fullscreen-modal">
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#fullscreenModal"
              >
                Fullscreen Modal
              </button>

              <!-- Modal -->
              <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalFullTitle">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </p>
                      <p>
                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.
                      </p>
                      <p>
                        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                      </p>
                      <p>
                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </p>
                      <p>
                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.
                      </p>
                      <p>
                        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                      </p>
                      <p>
                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </p>
                      <p>
                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.
                      </p>
                      <p>
                        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                      </p>
                      <p>
                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </p>
                      <p>
                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.
                      </p>
                      <p>
                        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                      </p>
                      <p>
                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </p>
                      <p>
                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.
                      </p>
                      <p>
                        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                      </p>
                      <p>
                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                      </p>
                      <p>
                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.
                      </p>
                      <p>
                        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal Sizes end -->

<!-- Modal Events start -->
<section id="modal-events">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Modal Events</h4>
        </div>
        <div class="card-body">
          <div class="demo-inline-spacing">
            <!-- Show Event  -->
            <div class="show-event-ex">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                id="onshowbtn"
                data-bs-target="#onshow"
              >
                On Show Event
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="onshow"
                tabindex="-1"
                aria-labelledby="myModalLabel21"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel21">Basic Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Donut chocolate halvah I love caramels. Dessert croissant I love icing I love dragée candy canes
                      chocolate bar. Oat cake lollipop I love cake chocolate bar jelly sweet. I love cotton candy oat
                      cake jelly.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Show Event End -->

            <!-- Shown Event -->
            <div class="shown-event-ex">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                id="onshownbtn"
                data-bs-target="#onshown"
              >
                On Shown Event
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="onshown"
                tabindex="-1"
                aria-labelledby="myModalLabel22"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel22">Basic Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Jujubes chocolate bar topping sweet caramels chocolate cake. Fruitcake pie wafer toffee sweet roll
                      I love. Chocolate pastry halvah bear claw jelly beans sesame snaps candy canes cotton candy. Jelly
                      macaroon pie toffee cupcake soufflé cotton candy.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Shown Event End -->

            <!-- Hide Event -->
            <div class="hide-event-ex">
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                id="onhidebtn"
                data-bs-target="#onhide"
              >
                On Hide Event
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="onhide"
                tabindex="-1"
                aria-labelledby="myModalLabel23"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel23">Basic Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Sweet roll I love pudding sweet roll jujubes donut I love cookie tart. Chocolate cake I love bear
                      claw bonbon dragée. Jujubes carrot cake jujubes I love lemon drops cookie. Jelly beans jujubes
                      cotton candy tootsie roll.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Hide Event End -->

            <!-- Hidden Event -->
            <div class="hidden-event-ex">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                id="onhiddenbtn"
                data-bs-target="#onhidden"
              >
                On Hidden Event
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="onhidden"
                tabindex="-1"
                aria-labelledby="myModalLabel24"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel24">Basic Modal</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Cookie cupcake dessert cotton candy donut cupcake marshmallow pie marzipan. Tootsie roll wafer
                      sesame snaps gummi bears cake. Cake icing cupcake I love gummi bears. Halvah I love chupa chups I
                      love bonbon I love.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Hidden Event End-->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal Events end -->

<!-- Form and scrolling Components start -->
<section id="form-and-scrolling-components">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form & Scrolling Modals</h4>
        </div>
        <div class="card-body">
          <div class="demo-inline-spacing">
            <div class="form-modal-ex">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                Login Form
              </button>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="inlineForm"
                tabindex="-1"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel33">Inline Login Form</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#">
                      <div class="modal-body">
                        <label>Email: </label>
                        <div class="mb-1">
                          <input type="text" placeholder="Email Address" class="form-control" />
                        </div>

                        <label>Password: </label>
                        <div class="mb-1">
                          <input type="password" placeholder="Password" class="form-control" />
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="scrolling-content-ex">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#exampleModalLong"
              >
                Scrolling long Content
              </button>
              <!-- Modal -->
              <div
                class="modal fade"
                id="exampleModalLong"
                tabindex="-1"
                aria-labelledby="exampleModalLongTitle"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                        Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                        powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah.
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="scrolling-inside-modal">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#exampleModalScrollable"
              >
                Scrolling Content Inside Modal
              </button>

              <!-- Modal -->
              <div
                class="modal fade"
                id="exampleModalScrollable"
                tabindex="-1"
                aria-labelledby="exampleModalScrollableTitle"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>
                        Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                        powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                      </p>
                      <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                      </p>
                      <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop
                        liquorice chocolate marzipan muffin pie liquorice.
                      </p>
                      <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah.
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="toggle-between-modal">
              <button
                type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalToggle"
              >
                Toggle Between Modals
              </button>

              <!-- Modal 1-->
              <div
                class="modal fade"
                id="modalToggle"
                aria-labelledby="modalToggleLabel"
                tabindex="-1"
                style="display: none"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalToggleLabel">Modal 1</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Show a second modal and hide this one with the button below.</div>
                    <div class="modal-footer">
                      <button
                        class="btn btn-primary"
                        data-bs-target="#modalToggle2"
                        data-bs-toggle="modal"
                        data-bs-dismiss="modal"
                      >
                        Open second modal
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal 2-->
              <div
                class="modal fade"
                id="modalToggle2"
                aria-hidden="true"
                aria-labelledby="modalToggleLabel2"
                tabindex="-1"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalToggleLabel2">Modal 2</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Hide this modal and show the first with the button below.</div>
                    <div class="modal-footer">
                      <button
                        class="btn btn-primary"
                        data-bs-dismiss="modal"
                      >
                        Back to first
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form and scrolling Components end -->
@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/components/components-modals.js')) }}"></script>
@endsection
