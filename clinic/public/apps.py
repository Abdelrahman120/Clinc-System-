from flask import Flask, render_template, request
from keras.models import load_model
from keras.models import Sequential
from keras.preprocessing import image
import cv2
import tensorflow as tf
import numpy as np

from keras.utils.image_utils import img_to_array
apps = Flask(__name__,template_folder='template')
dic = {0 : 'Normal', 1 : 'Doubtful', 2 : 'Mild', 3 : 'Moderate', 4 : 'Severe'}


#Image Size
img_size=256
model2 = load_model('model.h5')
model=Sequential()
model.make_predict_function()

def predict_label(img_path):
    img=cv2.imread(img_path)
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)  
    resized=cv2.resize(gray,(img_size,img_size)) 
    i =img_to_array(resized)/255.0
    i = i.reshape(1,img_size,img_size,1)
    p = np.argmax(model2.predict(i))
    print(model2.predict(i))
    print(p)
    return dic[p]


# routes
@apps.route("/", methods=['GET', 'POST'])
def main():
    
    return render_template('index.html')

@apps.route("/about")
def about_page():

    return "thank you!!!"

@apps.route("/predict", methods = ['GET', 'POST'])
def upload():
    print("nn")
    if request.method == 'POST':
       img = request.files['file']
       img_path = "uploads/" + img.filename    
       img.save(img_path)
       p= predict_label(img_path)
       return str(p).lower()
    return 'ok'   

  


if __name__ =='__main__':
    #app.debug = True
    apps.run(debug= True, use_reloader=False)